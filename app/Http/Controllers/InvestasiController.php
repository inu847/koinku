<?php

namespace App\Http\Controllers;

use App\Models\AsetInvest;
use App\Models\Emoney;
use App\Models\Investasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $invest = Auth::guard('user')->user()->investasi;

        return view('investasi.index', ['products' => json_decode($response), 'invest' => $invest]);
    }

    public function investPerusahaan(Request $request, $id)
    {
        $invest = $request->get('invest');
        $management = $request->get('management');

        $emoney = Auth::guard('user')->user()->eMoney;
        $resultEmoney = $emoney->emoney - $invest;

        if ($invest >= 10000 && $resultEmoney > 0) {
            $emoney->emoney = $resultEmoney;
            $emoney->save();

            $new_invest = new AsetInvest;
            $new_invest->invest = $invest;
            $new_invest->management = $management;
            $new_invest->custodian = $request->get('custodian');
            $new_invest->type = $request->get('type');
            $new_invest->perusahaan_id = $id;
            $new_invest->invest_id = Auth::guard('user')->user()->investasi->id;
            $new_invest->save();

            return redirect()->back()->with('status', 'Invest to '.$management.' Success');
        }else {
            return redirect()->route('investasi.index')->with('status', 'Invest to '.$management.' Failed');
        }
    }
}
