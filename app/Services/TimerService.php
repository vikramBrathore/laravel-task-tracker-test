<?php

namespace App\Services;

use App\Models\Timer;
use Carbon\Carbon;
use App\Models\Timer;

class TimerService
{
    public function start($taskId, $userId)
    {
        if (Timer::where('user_id',$userId)->whereNull('end_time')->exists()) {
            throw new Exception('Timer already running');
        }

        return Timer::create([
            'task_id'=>$taskId,
            'user_id'=>$userId,
            'start_time'=>now()
        ]);
    }

    public function stop($userId)
    {
        $timer = Timer::where('user_id',$userId)->whereNull('end_time')->firstOrFail();
        $timer->end_time = now();
        $timer->duration_seconds = now()->diffInSeconds($timer->start_time);
        $timer->save();

        return $timer;
    }
}
