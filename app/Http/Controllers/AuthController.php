<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function todoLogin()
    {
        // dd(Auth::guard('umkm')->check());
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $umkm = $request->all();
        unset($umkm['_token']);

        if(Auth::guard('umkm')->attempt($umkm)){
            return redirect()->route('dashboard');
        }else{
            return "Failed";
        }
    }

    public function logout()
    {
        $user = Auth::guard('umkm');
        $user->logout();

        return redirect()->route('home');
    }

    public function todoRegistrasi()
    {
        return view('auth.register');
    }
}
