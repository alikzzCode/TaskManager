<?php

namespace App\Http\Controllers\Filter;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class OrderByFilter extends Controller
{
    public function newest()
    {
        return Task::orderby('created_at', 'desc')->get();
    }

    public function high()
    {
        return Task::where('priority', 'high')->get();
    }

    public function medium()
    {
        return Task::where('priority', 'medium')->get();
    }

    public function low()
    {
        return Task::where('priority', 'low')->get();
    }


}
