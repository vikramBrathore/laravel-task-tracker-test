<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        return Task::create($request->validate([
            'project_id'=>'required',
            'title'=>'required',
            'assigned_user_id'=>'required',
            'estimated_hours'=>'required',
            'status'=>'required'
        ]));
    }
}
