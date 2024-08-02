<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Models\promotion;
use App\Models\room;

class CartController extends Controller
{

    public function cart(StoreCartRequest $request)
    {
        $check_in_date = $request->input('check_in_date');
        $check_out_date = $request->input('check_out_date');
        $adult = $request->input('adult');
        $children = $request->input('children');
        $checkInDate = new \DateTime($check_in_date);
        $checkOutDate = new \DateTime($check_out_date);
        $interval = $checkOutDate->diff($checkInDate);
        $dayCount = $interval->days;

        $room = room::query()->findOrFail(\request('room_id'));
        return view('booking', compact(
            'check_in_date',
            'check_out_date',
            'adult',
            'children',
            'checkInDate',
            'checkOutDate',
            'dayCount',
            'room',
        ));
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
}
