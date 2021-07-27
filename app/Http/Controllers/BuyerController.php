<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
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
}
