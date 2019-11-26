<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
class FordaController extends Controller
{
    function HalamanBerkas(Request $request){

        $peserta=Peserta::whereNotNull('bukti_bayar')->where('status','0')->get();
        return view('forda_konfirmasi_berkas',[
            'peserta'=>$peserta
        ]);
    }

    function ProsesTerimaBerkas(Request $request){
        $peserta = Peserta::where('id',$request->input('idPeserta'))->first();
        $peserta->update(['status'=>'1']);
        return redirect('/konfirmasi_berkas');
    }

    function ProsesTolakBerkas(Request $request){
        $peserta = Peserta::where('id',$request->input('idPeserta'))->first();
        $peserta->update(['status'=>'2','bukti_bayar'=>null,'kartu_pelajar'=>null]);
        return redirect('/konfirmasi_berkas');
    }
}
