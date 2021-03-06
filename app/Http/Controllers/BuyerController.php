<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('buyer')->check());
        $products = Product::where('status', 'publish')->paginate(50);

        return view('welcome', ['products' => $products]);
    }

    public function getUmkm(Request $request)
    {
        $user = User::get();
        $keywoard = $request->get('keyword');

        if ($keywoard) {
            $user = User::where('nama_umkm', 'LIKE', "%$keywoard%")->paginate(50);
        }
        return view('buyer.index', ['user' => $user]);
    }

    public function shoping($name)
    {
        $user = User::where('nama_umkm', $name)->first();
        // dd($user->role->role);
        if ($user->role->role == 'super') {
            $products = Product::where('user_id', $user->id)->where('status', 'publish')->paginate(30);
            // dd($products);
            return view('buyer.belanja', ['user' => $user, 'products' => $products]);
        }else {
            return redirect()->route('home');
        }
    }

    public function checkout(Request $request, $id)
    {
        // dd($request->all());
        $new_order = new Order;
        $new_order->status = "process";
        $new_order->product_id = json_encode($request->get('product_id'));
        $new_order->quantity = json_encode($request->get('quantity'));
        $new_order->total = $request->get('total');
        $new_order->user_id = $id;
        $new_order->buyer_id = Auth::guard('user')->user()->id;
        $new_order->save();

        return redirect()->back()->with('status', "order success!!");
    }

    public function viewJob($id)
    {
        $jobs = User::findOrFail($id)->job;

        return view('buyer.job', ['jobs' => $jobs]);
    }

    public function showProd($id)
    {
        $product = Product::findOrFail($id);
        
        return view('buyer.showprod', ['product' => $product]);
    }
}
