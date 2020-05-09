<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{

    public function getnotif(){
        $allnotif = DB::select("SELECT 'POST' as type, id, notified, read, date, post
        FROM total_notif_post
        WHERE notified = :userID 
        UNION
        SELECT 'VOTE' as type, id, notified, read, date, post
        FROM total_notif_vote
        WHERE notified = :userID
        UNION
        SELECT 'REPORT' as type, id, notified, read, date, post
        FROM total_notif_report
        WHERE notified = :userID;" , ['userID' => Auth::user()->id]);
        return collect($allnotif)->map(function($x) {return (array) $x; })->toArray();
    }


}
