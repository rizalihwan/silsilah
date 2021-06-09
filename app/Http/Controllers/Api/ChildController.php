<?php

namespace App\Http\Controllers\Api;

use App\Child;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChildRequest;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('child.index', [
            'childs' => Child::where('user_id', auth()->user()->id)->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('child.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildRequest $request)
    {
        try {
            auth()->user()->childs()->create($request->all());
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
    public function edit(Child $child)
    {
        return view('child.edit', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Child $child, ChildRequest $request)
    {
        try {
            $child->update($request->all());
        } catch (\Exception $e) {
            return back()->with('error', 'Data Gagal Diupdate!');
        }
        return back()->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        try {
            $child->grandchilds()->delete();
            $child->delete();
        } catch (\Exception $e) {
            return back()->with('error', 'Data Gagal Dihapus!');
        }
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
