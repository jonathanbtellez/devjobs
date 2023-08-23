<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Get notifications
        $notifications = auth()->user()->unreadNotifications;
        //clear notifications
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index', compact('notifications'));
    }
}
