<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class MoMoController extends Controller {
    public function online_checkout(Request $request) {
        if ($request->has('cod')) {
            // Handle COD payment
        } elseif ($request->has('payUrl')) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $request->new_total_price;
            $orderId = time();
            $redirectUrl = route('thanks');
            $ipnUrl = route('momo_ipn');
            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            // Save order information
            $order = Order::create([
                'user_id' => Auth::id(),
                'room_id' => $request->room_id,
                'name'=> $request->name,
                'address'=> $request->address,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'note'=> $request->note,
                'promotion_id' => $request->promotion_id,
                'check_in_date' => $request->check_in_date,
                'check_out_date' => $request->check_out_date,
                'adults' => $request->adult,
                'children' => $request->children,
                'new_total_price' => $amount,
            ]);
            event(new OrderCreated($order));

            // Save payment information
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'MoMo',
                'transaction_id' => $orderId,
                'amount' => $amount,
            ]);

            return redirect($jsonResult['payUrl']);
        }
    }

    private function execPostRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function momo_ipn(Request $request) {
        $data = $request->all();

        $order = Order::where('id', $data['orderId'])->first();

        if ($order && $data['resultCode'] == '0') {
            $order->update(['status' => 'paid']);
            $order->payments()->update(['status' => 'paid']);
        }

        return response()->json(['message' => 'IPN received'], 200);
    }
}
