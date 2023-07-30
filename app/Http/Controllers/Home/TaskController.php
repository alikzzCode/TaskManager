<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tasks = Task::all();
        return view('frontend.tasks.all', compact('tasks', 'categories'));
    }

    public function show($task_id)
    {
        $task = task::findorfail($task_id);
        $similarTasks = task::where('category_id',$task->category_id)->take(4)->get();
        return view('frontend.tasks.show', compact('task', 'similarTasks'));
    }
}
