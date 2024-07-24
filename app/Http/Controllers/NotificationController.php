<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class NotificationController extends Controller
{
    public function getUnreadNotificationsCount()
    {
        $unreadCount = Auth::user()->unreadNotifications->count();
        Log::info('Unread notifications count: ' . $unreadCount); // Tambahkan log
        return response()->json(['unreadCount' => $unreadCount]);
    }
    public function getNotifications()
    {
        $notifications = Auth::user()->unreadNotifications;
        $formattedNotifications = $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'type' => $notification->type,
                'data' => $notification->data,
                'created_at' => $notification->created_at->toDateTimeString(),
            ];
        });

        return response()->json(['notifications' => $formattedNotifications]);
    }


    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = $user->notifications->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}

