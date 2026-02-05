<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TimerService;

class TimerController extends Controller
{
    public function start(Request $request, TimerService $service)
    {
        return $service->start($request->task_id, auth()->id());
    }

    public function stop(TimerService $service)
    {
        return $service->stop(auth()->id());
    }
}
