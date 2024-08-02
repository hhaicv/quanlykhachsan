<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $rooms = \App\Models\room::query()->get();
        $service = \App\Models\Service::query()->get();
        $banners = banner::query()->get();
        return view('home', compact('rooms', 'service', 'banners'));
    }
    public function room()
    {
        $rooms = \App\Models\room::query()->get();
        return view('room', compact('rooms'));
    }

    public function show(string $id)
    {
        $list = room::query()->limit(4)->get();
        $data = room::query()->with('tags', 'services')->findOrFail($id);
        return view('show', compact('data', 'list'));
    }

    public function thanks()
    {
        $payment = Payment::query()->where('transaction_id', request()->orderId)->first();
        $order = Order::query()->where('id', $payment->order_id)->first();
        $room = room::query()->where('id', $order->room_id)->first();
        return view('thanks', compact('payment', 'order', 'room'));
    }
}
