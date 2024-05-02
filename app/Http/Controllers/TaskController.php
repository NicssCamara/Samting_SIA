<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index',['tasks' => $tasks]);
    }

    public function create(){
        return view('tasks.create');
    }
    
    public function store(Request $request){
       $data = $request->validate([
        'Title' => 'required',
        'Description' => 'required',
        'Completed' => 'required|boolean'
       ]);

       $newTask = Task::create($data);
       return redirect(route('task.index'));
    }
    public function edit($id)
{
    $task = Task::find($id);
    return view('tasks.edit', ['task' => $task]);
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'Title' => 'required',
        'Description' => 'required',
        'Completed' => 'required|boolean'
    ]);

    $task = Task::find($id);
    $task->update($data);
    return redirect(route('task.index'));
}

public function destroy($id)
{
    $task = Task::find($id);
    $task->delete();
    return redirect(route('task.index'));
}


}
