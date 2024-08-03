<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\promotion;
use App\Models\room;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    const PATH_VIEW = "admin.payment.";
    public function index()
    {
        $data = Payment::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pay = Payment::query()->findOrFail($id);
        $order = Order::query()->where('id', $pay->order_id)->first();
        $sale = promotion::query()->where('id', $order->promotion_id)->first();
        $room = room::query()->where('id', $order->room_id)->first();
        return view('admin.invoice', compact('pay', 'order', 'room', 'sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= Payment::query()->findOrFail($id);
        $data->delete();
        return back();
    }
}
