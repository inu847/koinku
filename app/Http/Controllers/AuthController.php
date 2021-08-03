<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function todoLogin()
    {
        if (Auth::guard('umkm')->check() == true) {
            return redirect()->back();
        }else {
            return view('auth.login');
        }
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
        if (Auth::guard('umkm')->check() == true) {
            return redirect()->back();
        }else {
            return view('auth.register');
        }
    }

    public function registrasi(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'nama_toko' => 'required', 'string', 'min:4', 'max:255',
            'phone' => 'required', 'string', 'min:6', 'max:255',
            'file_penunjang' => 'file|image|mimes:jpeg,png,jpg,pdf,docx',
            'ktp' => 'file|image|mimes:jpeg,jpg',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ])->validate();

        $new_user = new Umkm;
        $new_user->username = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->nama_umkm = $request->get('nama_toko');
        $new_user->phone = "+62".$request->get('phone');
        $new_user->status = "inactive";
        if($request->file('file_penunjang')){
            $file = $request->file('file_penunjang')->store('file_penunjangs', 'public');
            $new_user->file_umkm = $file;
        }
        if($request->file('ktp')){
            $file = $request->file('ktp')->store('ktps', 'public');
            $new_user->ktp = $file;
        }
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->save();
        
        return redirect()->route('login')->with('status', 'Create Akun Success!!');
    }

    // BUYER AUTHENTICATED
    public function todoLoginBuyer()
    {
        if (Auth::guard('buyer')->check() == true) {
            return redirect()->back();
        }else {
            return view('auth.loginBuyer');
        }
    }

    public function loginBuyer(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $umkm = $request->all();
        unset($umkm['_token']);

        if(Auth::guard('buyer')->attempt($umkm)){
            return redirect()->route('home');
        }else{
            return "Failed";
        }
    }

    public function logoutBuyer()
    {
        $user = Auth::guard('buyer');
        $user->logout();

        return redirect()->route('home');
    }

    public function todoRegistrasiBuyer()
    {
        if (Auth::guard('umkm')->check() == true) {
            return redirect()->back();
        }else {
            return view('auth.registerBuyer');
        }
    }

    public function registrasiBuyer(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'phone' => 'required', 'string', 'min:6', 'max:255',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ])->validate();

        $new_user = new Buyer;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->phone = "+62".$request->get('phone');
        $new_user->status = "active";
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->save();
        
        return redirect()->route('login')->with('status', 'Create Akun Success!! Prosess memakan waktu paling lama 2x24, cek secara berkala email kamu!');
    }
}
