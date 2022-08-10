<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;

class NotificacoesController extends Controller
{
    public function index()
    {
        return view('pages.notificacoes.list');
    }

    public function markAsRead(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return back();
    }

}
