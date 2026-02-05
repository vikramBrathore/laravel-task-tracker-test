<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        /*echo "<pre>";
        print_r($request->all());
        echo "</pre>";
        exit();*/
        return Project::create(
            $request->validate([
                'name'=>'required',
                'description'=>'nullable'
            ])
        );
    }
}
