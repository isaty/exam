<?php

namespace App\Http\Controllers;

use App\Exam;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AutoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function autostart()
    {

        $start = Exam::where('status', '=', 'scheduled')->get('scheduled_time');
        if ($start) {
            if (isset($start[0]['scheduled_time'])) {
                $str = Carbon::parse($start[0]['scheduled_time']);
                $current = Carbon::now('Asia/Kolkata');
                $time=$current->format('H:i:s');
                if ($str < $current || $str == $current) {
                    $change = Exam::where('scheduled_time', '=', $time)->orWhere('scheduled_time', '<', $time);
                    $changed=$change->where('status', '=', 'scheduled')->update(['status' => 'running']);
                    if ($changed)
                        return "exam started";
                }
                return "exam scheduled";
            }
        }
        return "no exam scheduled to be started";
    }


    
    public function autoend()
    {

        $start = Exam::where('status', '=', 'running')->get('termination_time');
        if ($start) {
            if (isset($start[0]['termination_time'])) {
                $str = Carbon::parse($start[0]['termination_time']);
                $current = Carbon::now('Asia/Kolkata');
                $time=$current->format('H:i:s');
                if ($str < $current || $str == $current) {
                    $change = Exam::where('termination_time', '=',$time)->orWhere('termination_time', '<',$time);
                    $changed=$change->where('status', '=', 'running')->update(['status' => 'finished']);
                    if ($changed)
                        return "exam finished";
                }
                return "exam scheduled to be terminated";
            }
        }
        return "no exam scheduled to be terminated";
    }
}
