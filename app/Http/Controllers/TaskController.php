<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Title' => 'required',  
            'Description' => 'required'
        ]);
        $data['Completed'] = 0;

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

    public function toggleComplete($id, Request $request)
    {
        $task = Task::find($id);
        $task->Completed = $request->input('completed');
        $task->save();

        return response()->json(['success' => 'Task completion status updated']);
    }
    public function togglePriority($id)
    {
        $task = Task::find($id);
        $task->Priority = !$task->Priority; // Toggle priority status
        $task->save();
    
        return redirect(route('task.index'));
    }
    public function showPriority()
    {
        $tasks = Task::where('Priority', 1)->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }
    public function showCompleted()
{
    $tasks = Task::where('Completed', 1)->get();
    return view('tasks.index', ['tasks' => $tasks]);
}
public function getStarStatus($id)
{
    $task = Task::find($id);
    if (!$task) {
        return response()->json(['error' => 'Task not found'], 404);
    }

    return response()->json(['starFilled' => $task->Priority]); // Assuming Priority field indicates star status
}
public function showUnfinished()
{
    $tasks = Task::where('Completed', 0)->get();
    return view('tasks.index', ['tasks' => $tasks]);
}


};
