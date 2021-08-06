<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::guard('user')->user()->order;

        return view('manage-order.index', ['orders' => $orders]);
    }
}
