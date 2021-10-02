<?php

namespace App\Http\Controllers;

use App\Models\Rekpen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RekpenController extends Controller
{
    public function index()
    {
        $rekpen = Rekpen::paginate(30);

        return view('rekpen.index', ['rekpens' => $rekpen]);
    }

    public function create()
    {
        return view('rekpen.create');
    }

    public function bayar(Request $request)
    {
        $rekpen = new Rekpen;
        $rekpen->judul = $request->get('judul');
        $rekpen->nominal = $request->get('nominal');
        $rekpen->status = 'tertahan';
        $rekpen->token = generateToken();
        $rekpen->seller_id = Auth::guard('user')->user()->id;
        $email = $request->get('email');
        $user_id = User::where('email', $email)->first()->id;
        $rekpen->buyer_id = $user_id;
        $rekpen->save();
        
        \Midtrans\Config::$serverKey = 'SB-Mid-server-1gMTDRgG6CVPjAKkhH9wPvqy';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => $rekpen->id,
                'gross_amount' => $rekpen->nominal,
            ),
            'item_details' => array(
                "id" => $order->id,
                "price" => $order->row_total,
                "quantity" => $order->quantity,
                "name" => "Orange"
            ),
            'customer_details' => array(
                'first_name' => Auth::guard('user')->user()->name,
                // 'last_name' => 'pratama',
                'email' => Auth::guard('user')->user()->email,
                'phone' => Auth::guard('user')->user()->phone,
            ),
        );
        try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            
            // Redirect to Snap Payment Page
            header('Location: ' . $paymentUrl);
          }
          catch (\Exception $e) {
            echo $e->getMessage();
          }
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $data = array(
            'token' => $snapToken
        );
        return $data;
    }

    public function findByEmail(Request $request)
    {
        $email = $request->get('email');
        $user = User::where('email', 'LIKE', "%$email%")->paginate(10);

        return $user;
    }
}