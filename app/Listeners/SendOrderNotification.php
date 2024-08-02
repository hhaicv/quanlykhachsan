<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SendOrderNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event)
    {
        Auth::user()->id;
        Auth::user()->email;
        if (Auth::user()) {
            Notification::send(Auth::user(), new OrderNotification($event->order));
        }
    }
    // public function handle(OrderCreated $event)
    // {
    //     $admin = User::where('role', 'admin')->first();
    //     if ($admin) {
    //         Notification::send($admin, new OrderNotification($event->order));
    //     }
    // }
}
