<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\promotion;
use App\Models\room;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $sale = promotion::query()->limit(4)->get();


        return view('booking', compact(
            'check_in_date',
            'check_out_date',
            'adult',
            'children',
            'checkInDate',
            'checkOutDate',
            'dayCount',
            'room',
            'sale'
        ));

        // $room = room::query()->findOrFail(\request('room_id'));

        // session()->put("cart.rooms", $room->id);
        // dd(session()->get('cart'));

        // $data=$request->all();
        // Cart::query()->create($data);
        // return redirect()->route("booking");

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

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
