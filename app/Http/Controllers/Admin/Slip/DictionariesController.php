<?php

namespace App\Http\Controllers\Admin\Slip;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictionaries = Dictionary::all();

        return view('admin.slip.dictionaries.index')
            ->with(compact('dictionaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dictionary = new Dictionary;
        return view('admin.slip.dictionaries.create')
            ->with(compact('dictionary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dictionary = new Dictionary;

        $dictionary->fill($request->all());

        $dictionary->save();

        return redirect(route('admin.slip.dictionaries.index'))
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
        return Dictionary::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        if (empty($dictionary)) return redirect(route('admin.slip.dictionaries.index'));

        return view('admin.slip.dictionaries.edit')
            ->with(compact('dictionary'));
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
        $dictionary = Dictionary::findOrFail($id);

        if (empty($dictionary)) return redirect(route('admin.slip.dictionaries.index'));

        $dictionary->fill($request->all());

        $dictionary->save();

        return redirect(route('admin.slip.dictionaries.index'))
            ->with('message_success', 'Successfully Update!');
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
