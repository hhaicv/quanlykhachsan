<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\promotion;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function applyDiscount(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'total_price' => 'required|numeric'
        ]);

        $discountCode = promotion::isValid($request->code);

        if (!$discountCode) {
            return response()->json(['message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn!'], 400);
        }

        $discountAmount = ($request->total_price * $discountCode->discount_rate) / 100;
        $newTotalPrice = $request->total_price - $discountAmount;

        return response()->json(['new_total_price' => $newTotalPrice]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|integer',
            'user_id' => 'required|integer',
            'promotion_id' => 'required|integer',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'adult' => 'required|integer',
            'children' => 'required|integer',
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'new_total_price' => 'required|numeric',
        ]);
        Booking::create($data);
        return redirect()->route('/')->with('status', 'Operation was successful!');

    }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreBookingRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
