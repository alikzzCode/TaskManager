<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        $actionCount = Activity::whereDate('created_at', Carbon::today())->count();
        $userCount = User::all()->count();
        $taskCount = Task::all()->count();
        $categoryCount = Category::all()->count();
        return view('admin.dashboard.index', compact('actionCount','categoryCount', 'userCount', 'taskCount'));
    }

    public function activity()
    {
        $activities = Activity::all();
        return view('admin.dashboard.activity', compact('activities'));
    }

    public function category()
    {   $category = null;
        $tasks = Task::where('category_id',$category)->count();
        $categories = Category::all();
        return view('admin.dashboard.category', compact('tasks','categories'));

    }

}
