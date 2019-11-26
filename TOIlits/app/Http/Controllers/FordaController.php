<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Pengumuman;
class FordaController extends Controller
{
    function HalamanBerkas(Request $request){

        $peserta=Peserta::whereNotNull('bukti_bayar')->where('status','0')->get();
        return view('forda_konfirmasi_berkas',[
            'peserta'=>$peserta
        ]);
    }
    function HalamanNotif(Request $request){
        $notif = Pengumuman::where('forda_id',$request->session()->get('id'))->get();
        return view('/notifikasi_forda',[
            'notif'=>$notif
        ]);
    }

    function ProsesTambahNotif(Request $request){
        Pengumuman::create([
            'pengumuman'=>$request->input('notif'),
            'forda_id'=>$request->session()->get('id')
        ]);

        return redirect('/kelola_notifikasi');
    }

    function ProsesEditNotif(Request $request){
        $pengumuman = Pengumuman::where('id',$request->input('id'));
        $pengumuman->update([
            'pengumuman'=>$request->input('editnotif')
        ]);
        return redirect('/kelola_notifikasi');
    }

    function ProsesHapusNotif(Request $request){
        Pengumuman::where('id',$request->input('id'))->delete();
        
        return redirect('/kelola_notifikasi');
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
