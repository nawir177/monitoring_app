<?php

namespace App\Http\Controllers;

use App\Models\TaskProject;
use App\Http\Requests\StoreTaskProjectRequest;
use App\Http\Requests\UpdateTaskProjectRequest;
use App\Models\Project;
use Facade\IgnitionContracts\RunnableSolution;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\task;

class TaskProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTask($id)
    {
        return view('task.create', [
            "id_project" => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // dd($request);
        $project = Project::find($request->project_id);
        foreach ($request->task as $value) {
            TaskProject::create([
                "project_id" => $project->id,
                "task_name" => $value,
                'value' => 0
            ]);
        }
        return redirect("/project/$project->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskProject  $taskProject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view("task.index",[
        //     "data"=>TaskProject::where('project_id',$id)->get()
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskProject  $taskProject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('task.edit', [
            "data" => TaskProject::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskProjectRequest  $request
     * @param  \App\Models\TaskProject  $taskProject
     * @return \Illuminate\Http\Response
     */

    public function updateTask(Request $request, $id)
    {
        $task = TaskProject::find($id);
        $task_idProject = $task->project_id;
        $task->update([
            "task_name" => $request['taskname']
        ]);



        return redirect("/project/$task_idProject")->with("sukses", "Data Berhasil di Update");
    }

    public function update(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();
        $totalTask = $project->taskProject()->count();

        // clean taskProject
        TaskProject::where('project_id', $project->id)->update([
            "value" => 0
        ]);

        $doneTask = TaskProject::whereIn('id', $request->task)->update([
            "value" => 1
        ]);

        $progres = ($doneTask / $totalTask) * 100;
        Project::find($id)->update([
            "progres" => $progres
        ]);

        return redirect("/project/$id")->with("sukses", "Data Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskProject  $taskProject
     * @return \Illuminate\Http\Response
     */
    public function TaskDelete($id)
    {
        $id_project = TaskProject::find($id)->project_id;
        TaskProject::destroy($id);
        return redirect("/project/$id_project")->with("sukses", "Data Berhasil Di Hapus");
    }
}
