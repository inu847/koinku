<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestasiController extends Controller
{
    public function index()
    {
        $url = "https://ojk-invest-api.vercel.app/api/products";

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return view('investasi.index', ['products' => json_decode($response)]);
    }
}
