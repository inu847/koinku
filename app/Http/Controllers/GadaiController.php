<?php

namespace App\Http\Controllers;

use App\Models\Gadai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GadaiController extends Controller
{
    public function index()
    {
        $gadai = Auth::guard('user')->user()->gadai->first();
        // dd($gadai);
        return view('gadai.index', ['gadai' => $gadai]);
    }

    public function create($id)
    {
        $user = Auth::guard('user')->user();

        return view('gadai.create', ['id' => $id, 'user' => $user]);
    }

    public function storeGadai(Request $request, $id)
    {
        $create_gadai = new Gadai;
        $ktp = $request->file('ktp');
        if ($ktp) {
            $file_ktp = $ktp->store('jaminan/'.Auth::guard('user')->user()->id, 'public');
            $create_gadai->ktp = $file_ktp;
        }
        $jaminan = $request->file('jaminan');
        if ($jaminan) {
            $file_jaminan = $jaminan->store('jaminan/'.Auth::guard('user')->user()->id, 'public');
            $create_gadai->jaminan = $file_jaminan;
        }
        $create_gadai->keterangan = $request->get('keterangan');
        $create_gadai->paket = $id;
        $create_gadai->status = 'process';
        $create_gadai->user_id = Auth::guard('user')->user()->id;
        $create_gadai->save();

        return redirect()->route('gadai.index')->with('status', 'pegadaian anda sedang di process');
    }
}
