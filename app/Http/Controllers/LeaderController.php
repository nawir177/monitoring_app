<?php

namespace App\Http\Controllers;

use App\Models\leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreleaderRequest;
use App\Http\Requests\UpdateleaderRequest;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leader.index',[
            "data"=>leader::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreleaderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'img' => 'file|required|max:2000'
        ]);

        $validasiData['img'] = $request->file('img')->store('leader-images');
        Leader::create($validasiData);
        return redirect('/leader')->with('berhasil', 'data berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show(leader $leader)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('leader.edit',[
            'data'=>leader::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateleaderRequest  $request
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'img' => 'file|max:2000'
        ]);
        if ($request->file('img')) {
            if ($request->gambarLama) { Storage::delete($request->gambarLama);
            }
            $validasiData['img'] = $request->file('img')->store('leader-images');
        }
        Leader::where('id', $id)->update($validasiData);
        return redirect('/leader')->with('sukses', 'data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $oldImage = $request['oldImage'];
        Leader::destroy($id);
        Storage::delete($request->oldImage);
        return redirect('/leader')->with('sukses', 'Data Berhasi di hapus');
    }
}
