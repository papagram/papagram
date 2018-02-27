<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Client;
use App\Entities\Estimate;
use App\Entities\Item;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepositoryEloquent;
use App\Repositories\EstimateRepositoryEloquent;
use App\Repositories\ItemRepositoryEloquent;
use DB;
use Illuminate\Http\Request;
Use Log;
use Session;

class EstimatesController extends Controller
{
    private $estimateRepository;
    private $clientRepository;
    private $itemRepository;

    public function __construct(
        ClientRepositoryEloquent $client_repository,
        EstimateRepositoryEloquent $estimate_repository,
        ItemRepositoryEloquent $itemRepository
    )
    {
        $this->clientRepository = $client_repository;
        $this->estimateRepository = $estimate_repository;
        $this->itemRepository = $itemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estimates = $this->estimateRepository->all();

        return view(
            'admin.estimates.index',
            compact('estimates')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estimate $estimate)
    {
        $items = $this->getItems();
        $clients = $this->clientRepository->all();

        return view(
            'admin.estimates.create',
            compact('estimate', 'items', 'clients')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $estimate = $this->estimateRepository->create($request->all());

            foreach ($request->items as $item_params) {
                $estimate->items()->save(new Item($item_params));
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()
                ->route('admin.estimates.create')
                ->withInput()
                ->with(
                    'message_error',
                    'エラーが発生しました。お手数ですが最初からやり直してください。'
                );
        }

        return redirect()
            ->route('admin.estimates.index')
            ->with('message_success', 'Estimate saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimate = $this->estimateRepository->find($id);
        $items = $estimate->items;
        $clients = $this->clientRepository->all();

        return view(
            'admin.estimates.edit',
            compact('estimate', 'items', 'clients')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $estimate = $this->estimateRepository->update($request->all(), $id);

            $targetItemIds = $estimate->items->pluck('id')->diff(
                collect($request->items)->pluck('id')
            );

            if ($targetItemIds->count() > 0) Item::destroy($targetItemIds);

            foreach ($request->items as $item) {
                // create
                if (empty($item['id']))
                    $estimate->items()->save(new Item($item));

                // update
                if (!empty($item['id'])) {
                    $estimate->items()->save(
                        $this->itemRepository->find($item['id'])->fill($item)
                    );
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }


        return redirect()
            ->route('admin.estimates.index')
            ->with('message_success', 'Estimate saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getItems()
    {
        $items = collect([]);

        if (Session::has('_old_input.items')) {
            foreach (Session::get('_old_input.items') as $params) {
                $item = new Item;
                $items = $items->merge([$item->fill($params)]);
            }
        } else {
            $item = new Item;
            $items = $items->merge([$item]);
        }

        return $items;
    }
}
