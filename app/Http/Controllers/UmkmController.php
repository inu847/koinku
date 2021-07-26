<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function dashboard()
    {
        return view('umkm.index');
    }

    public function todoSetting()
    {
        $user = Auth::guard('umkm')->user();
        // dd($user);
        return view('umkm.account', ['user' => $user]);
    }

    public function setting(Request $request)
    {
        $user = Auth::guard('umkm')->user();
        $user->username = $request->get('username');
        $user->username = $request->get('username');
        $user->tanggal_lahir = $request->get('tanggal_lahir');
        // $user->profil = $request->get('profil');
        $user->alamat = json_encode($request->get('alamat'));
        // dd($request->all());
        $user->save();

        return redirect()->back()->with('status', 'Perubahan akun berhasil!!');
    }
}
