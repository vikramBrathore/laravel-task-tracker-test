<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function generate()
        {
            $report = Report::create(['type'=>'user_hours']);
            GenerateUserHoursReport::dispatch($report);

            return response()->json(['message'=>'Report generation started']);
        }

        public function show($id)
        {
            return Report::findOrFail($id);
        }
}
