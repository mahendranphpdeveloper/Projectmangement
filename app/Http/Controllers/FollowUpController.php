<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\FollowUp;
use Carbon\Carbon;

class FollowUpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'clientid' => 'required',
        ]);
        if (!empty($request->content1)) {
    $conetent =  $request->content1;
    $clientID = $request->clientid;
    $reply = $request->type1;
 
    $date  =  $request->scheduled_date;
}else{

    $conetent =  $request->content2;
    $clientID = $request->clientid;
    $reply = $request->type2;
    $followUpPeriod =  (int) ($request->follow_up_period ?? 1);
    $scheduledDate =  Carbon::today();  
    $followUpDate = $scheduledDate->addMonths($followUpPeriod);
    $followUpDateFormatted = $followUpDate->format('Y-m-d');
    $date  =  $followUpDateFormatted;
}


FollowUp::create([
    'client_id' => $clientID,
    'content' => $conetent,
    'type' => $reply,
    'scheduled_date' => $date,
]);

        return response()->json(['success' => 'Follow-up added successfully.']);
    }
}

