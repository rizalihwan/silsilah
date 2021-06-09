<?php

namespace App\Http\Controllers\Api;

use App\Child;
use App\Grandchild;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GrandchildRequest;

class GrandchildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grandchild.index', [
            'grandchilds' => Grandchild::where('user_id', auth()->user()->id)->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grandchild.create', [
            'parents' => Child::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrandchildRequest $request)
    {
        $attr = $request->all();
        $attr['child_id'] = request('child_id');
        try {
            auth()->user()->grandchilds()->create($attr);
        } catch (\Exception $e) {
            return back()->with('error', 'Data Gagal Disimpan!');
        }
        return back()->with('success', 'Data Berhasil Disimpan');
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
    public function edit(Grandchild $grandchild)
    {
        return view('grandchild.edit', [
            'grandchild' => $grandchild,
            'parents' => Child::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grandchild $grandchild)
    {
        try {
            $grandchild->delete();
        } catch (\Exception $e) {
            return back()->with('error', 'Data Gagal Dihapus!');
        }
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
