<?php

namespace App\Http\Controllers;

use App\Models\progres;
use App\Http\Requests\StoreprogresRequest;
use App\Http\Requests\UpdateprogresRequest;
use Illuminate\Http\Request;

class ProgresController extends Controller
{
    /**
     * Display a listing of the resource.     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('progres.index', [
            "data" => progres::with('project')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprogresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprogresRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\progres  $progres
     * @return \Illuminate\Http\Response
     */
    public function show(progres $progres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\progres  $progres
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view("progres.edit", [
            "data" => progres::with('project')->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprogresRequest  $request
     * @param  \App\Models\progres  $progres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id= $request['id'];
        $request['progres1'] == "berhasil" ? $nilai1 = 15 : $nilai1 = 0;
        $request['progres2'] == "berhasil" ? $nilai2 = 15 : $nilai2 = 0;
        $request['progres3'] == "berhasil" ? $nilai3 = 15 : $nilai3 = 0;
        $request['progres4'] == "berhasil" ? $nilai4 = 15 : $nilai4 = 0;
        $request['progres5'] == "berhasil" ? $nilai5 = 20 : $nilai5 = 0;
        $request['progres6'] == "berhasil" ? $nilai6 = 20 : $nilai6 = 0;
        $total = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6;
        $request['total'] = $total;
    
        if (progres::find($id)->update([
            "progres1"=>$request['progres1'],
            "progres2" => $request['progres2'],
            "progres3" => $request['progres3'],
            "progres4" => $request['progres4'],
            "progres5" => $request['progres5'],
            "progres6" => $request['progres6'],
            "total"=>$total,
        ])) {
            return redirect('/progres')->with("sukses", "DATA BEHASIL DI UPDATE");
        } else {
            return redirect('/progres')->with("gagal", "DATA GAGAL DI UPDATE");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\progres  $progres
     * @return \Illuminate\Http\Response
     */
    public function destroy(progres $progres)
    {
        //
    }
}
