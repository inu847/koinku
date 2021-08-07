<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GadaiController extends Controller
{
    public function index()
    {
        return view('gadai.index');
    }

    
}
