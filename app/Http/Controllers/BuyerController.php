<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Umkm;
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
        $user = Umkm::get();
        $keywoard = $request->get('keyword');

        if ($keywoard) {
            $user = Umkm::where('nama_umkm', 'LIKE', "%$keywoard%")->paginate(50);
        }
        return view('buyer.index', ['user' => $user]);
    }

    public function shoping($id)
    {
        $user = Umkm::findOrFail($id);
        $products = Product::where('umkm_id', $user->id)->where('status', 'publish')->paginate(30);
        // dd($products);
        return view('buyer.belanja', ['user' => $user, 'products' => $products]);
    }
}
