<?php

namespace App\Http\Controllers\Admin\Slip;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Receipt;
use DB;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::yetPrintedWithReceiptsCount()->get();

        return view('admin.slip.cards.index')
            ->with(compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card = new Card;

        return view('admin.slip.cards.create')
            ->with(compact('card'));
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
            $card = new Card;
            $card->fill($request->all());
            $card->save();

            foreach ($request->receipts as $receipt) {
                if (is_null($receipt['payee'])) continue;

                $card->receipts()->save(new Receipt($receipt));
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()
                ->route('admin.slip.cards.create')
                ->withInput()
                ->with('message_error', 'エラーが発生しました。入力内容をご確認下さい。');
        }

        return redirect(route('admin.slip.cards.index'))
            ->with('message_success', 'Successfully Created!');
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
}
