<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{

    public function getnotif(){
        $allnotif = DB::select("SELECT 'POST' as type, notified, read, total_notif_post.date as date, total_notif_post.post as post, post.text_body as text
        FROM total_notif_post, post
        WHERE notified = :userID and total_notif_post.post = post.id
        UNION
        SELECT 'VOTE' as type, notified, read, total_notif_vote.date as date, total_notif_vote.post as post, post.text_body as text
        FROM total_notif_vote, post
        WHERE notified = :userID and total_notif_vote.post = post.id
        UNION
        SELECT 'REPORT' as type, notified, read, date, post, '' as text
        FROM total_notif_report
        WHERE notified = :userID
        ORDER BY date desc" , ['userID' => Auth::user()->id]);
        return collect($allnotif)->map(function($x) {return (array) $x; })->toArray();
    }


}
