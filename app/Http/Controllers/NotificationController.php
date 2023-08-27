<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getUserNotifications(){
        return view('frontend.pages.notifications', ['notifications' => Notification::getNotifications()]);
    }
}
