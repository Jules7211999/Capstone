<?php

use Carbon\Carbon;
use App\Models\HistoryLog;

function history( $activity){
    $dtm = Carbon::now(); 
    HistoryLog::create([
        'datetimezone' => $dtm,
        'month_name' => $dtm -> monthName,
        'day_of_week' => $dtm -> shortLocaleDayOfWeek,
        'user_id' => auth()->user()->id,
        'activity' => $activity
    ]);
}
