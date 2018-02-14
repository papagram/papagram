<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Estimate;
use App\Entities\Item;
use App\Http\Controllers\Controller;
use App\Repositories\EstimateRepositoryEloquent;
use Illuminate\Http\Request;
use Session;

class EstimatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estimate $estimate)
    {
        $items = $this->getItems();

        return view(
            'admin.estimates.create',
            compact('estimate', 'items')
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
        // return redirect(route('admin.estimates.create'))->withInput();
        // dd($request->has('items'));
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
        //
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
        //
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
