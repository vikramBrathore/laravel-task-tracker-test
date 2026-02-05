<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Timer;

class GenerateUserHoursReport implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = Timer::select('user_id', DB::raw('SUM(duration_seconds)/3600 as hours'))
        ->groupBy('user_id')->get();

        $this->report->update([
            'data'=>$data,
            'file_path'=>'reports/user_hours_'.$this->report->id.'.json'
        ]);

        Storage::put($this->report->file_path, $data);
    }
}
