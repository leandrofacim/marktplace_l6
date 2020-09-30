<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class NotificationController extends Controller
{
    public function notifications()
    {
        $unreadNotificationsUser = auth()->user()->unreadNotifications;

        return view('admin.notifications', compact('unreadNotificationsUser'));
    }

    public function readAll()
    {
        $unreadNotificationsUser = auth()->user()->unreadNotifications;

        $unreadNotificationsUser->each(function($notification) {
            $notification->markAsRead();
        });

        flash('Notificações lida com sucesso!')->success();
        return redirect()->back();
    }

    public function read($notification)
    {
        $notification = auth()->user()->notifications()->find($notification);
        $notification->markAsRead();

        flash('Notificação lida com sucesso!')->success();
        return redirect()->back();
    }
}
