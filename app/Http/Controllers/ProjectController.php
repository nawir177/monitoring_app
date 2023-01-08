<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\leader;
use App\Models\progres;
use App\Models\project;
use App\Models\TaskProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('project.index', [
            "data" => project::with(['leader','taskproject','client'])->get(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("project.create",[
            "data"=> leader::all(),
            "client"=>Client::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

        $validasi = $request->validate([
            "project-name"=>"required",
            "leader_id" => "required",
            "client_id" => "required",
            "start-date" => "required",
            "end-date" => "required",
            "progres"=>"required"
        ]);

        $validasi['client']= "client";

        if($validasi){
            project::create($validasi);
            return redirect('/project')->with("sukses","DATA BERHASIL DI TAMBAH");
        }else{
            return redirect('/project')->with("gagal", "DATA GAGAL DI TAMBAH");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view("task.index",[
            "data" => project::with(['taskproject'])->find($id),
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('project.edit',[
            "data"=>project::with(['leader'])->find($id),
            "leader"=>Leader::all(),
            "client"=>Client::all()
        ]);
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
        $validasi = $request->validate([
            "project-name" => "required",
            "leader_id" => "required",
            "client_id" => "required",
            "start-date" => "required",
            "end-date" => "required",
            "progres" => "required"
        ]);
        if ($validasi) {
            project::find($id)->update($validasi);
            return redirect('/project')->with("sukses", "DATA BERHASIL DI UPDATE");
        } else {
            return redirect('/project')->with("gagal", "DATA GAGAL DI UPDATE");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        $task = TaskProject::where('project_id',$id);
        if($task){
            TaskProject::where('project_id',$id)->delete();
        }
        return redirect('/project')->with("sukses", "DATA BERHASIL DI HAPUS");
    }

}
