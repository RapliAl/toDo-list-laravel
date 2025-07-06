<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('home', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
        ]);
        
        return redirect('/');
    }

    public function update(Task $task)
    {
        $task->update ([
            'completed' =>! $task->completed
        ]);
        

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }
}