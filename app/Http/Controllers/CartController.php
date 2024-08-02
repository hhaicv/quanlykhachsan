<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
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
}
