<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\room;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStock
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
    // public function handle(OrderCreated $event)
    // {
    //     $room = room::where('name', $event->order->room_id->name)->first();
    //     if ($room) {
    //         $room->quantity -= 1;
    //         $room->save();
    //     }
    // }
}
