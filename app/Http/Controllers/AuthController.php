<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // BUYER AUTHENTICATED
    public function todoLogin()
    {
        if (Auth::guard('user')->check() == true) {
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
        $user = $request->all();
        unset($user['_token']);

        if(Auth::guard('user')->attempt($user)){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('status', 'password atau username salah!!');
        }
    }

    public function logout()
    {
        $user = Auth::guard('user');
        $user->logout();

        return redirect()->route('home');
    }

    public function todoRegistrasi()
    {
        if (Auth::guard('user')->check() == true) {
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
            'phone' => 'required', 'string', 'min:6', 'max:255',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ])->validate();

        $new_user = new User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->phone = "+62".$request->get('phone');
        $new_user->status = "active";
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->save();
        
        $new_role = new Roles;
        $new_role->role = 'buyer';
        $new_role->user_id = $new_user->id;
        $new_role->save();

        return redirect()->route('login')->with('status', 'Create Akun Success!! Prosess memakan waktu paling lama 2x24, cek secara berkala email kamu!');
    }

    // DAFTAR UMKM
    public function registrasiUmkm(Request $request)
    {
        \Validator::make($request->all(), [
            'nama_toko' => 'required', 'string', 'min:4', 'max:255',
            'file_penunjang' => 'file|image|mimes:jpeg,png,jpg,pdf,docx',
            'ktp' => 'file|image|mimes:jpeg,jpg',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ])->validate();

        $upgrade_user = Roles::findOrFail(Auth::guard('user')->user()->id);
        $upgrade_user->nama_umkm = $request->get('nama_toko');
        $upgrade_user->status_upgrade = "process";
        if($request->file('file_penunjang')){
            $file = $request->file('file_penunjang')->store('file_penunjangs', 'public');
            $upgrade_user->file_umkm = $file;
        }

        if($request->file('ktp')){
            $file = $request->file('ktp')->store('ktps', 'public');
            $upgrade_user->ktp = $file;
        }

        \Hash::check($request->get('password'), Auth::guard('user')->user()->password);
        $upgrade_user->user_id = Auth::guard('user')->user()->id;
        $upgrade_user->save();
        
        return redirect()->route('login')->with('status', 'Create Akun Success!!');
    }
}
