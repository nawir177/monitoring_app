<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index',[
            "data"=>Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $validated = $request->validate([
            "client_name"=>"required|max:100",
            "phone"=>"required|max:15",
            "email"=>"required|email",
            "address"=>"required"
        ]);
        Client::create($validated);

        return redirect('client/')->with("success" , "data saved successfully");
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
        return view("client.edit",[
            "data"=>Client::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            "client_name"=>"required|max:100",
            "phone"=>"required|max:15",
            "email"=>"required|email",
            "address"=>"required"
        ]);
        Client::find($id)->update($validated);

        return redirect('client/')->with("success" , "data Update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::where('id',$id)->delete();
        return redirect('client/')->with("success" , "data deleted successfully");
    }
}
