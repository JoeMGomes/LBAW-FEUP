<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class NotificationController extends Controller
{
    //
    public function getNotifications(Request $request){
        if(Auth::check()){
            $obj = new Notification();
            $response = $obj->getnotif();
        return response()->json($response);
        }
    }
}

