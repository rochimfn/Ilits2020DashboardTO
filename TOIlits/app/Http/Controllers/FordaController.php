<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
class FordaController extends Controller
{
    function HalamanBerkas(Request $request){

        $peserta=Peserta::whereNotNull('bukti_bayar')->get();
        return view('forda_konfirmasi_berkas',[
            'peserta'=>$peserta
        ]);
    }
}
