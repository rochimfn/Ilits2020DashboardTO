<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Pengumuman;
use App\Paket;
use App\Forda;
use App\JawabanTryout;
use PDF;
class FordaController extends Controller
{
    function HalamanBerkas(Request $request){

        $peserta=Peserta::whereNotNull('bukti_bayar')->where('status','0')->where('forda_id',$request->session()->get('id'))->get();
        $forda = Forda::where('id',$request->session()->get('id'))->first();
        return view('/forda_konfirmasi_berkas',[
            'peserta'=>$peserta,
            'forda'=>$forda->nama
        ]);
    }
    function HalamanNotif(Request $request){
        $notif = Pengumuman::where('forda_id',$request->session()->get('id'))->get();
        return view('/notifikasi_forda',[
            'notif'=>$notif
        ]);
    }

    function HalamanKoreksiTryout(Request $request){
        return view('/koreksi_tryout');
    }

    function HalamanDaftarPeserta(Request $request){
        $peserta  = Peserta::where('forda_id',$request->session()->get('id'))->where('status','1')->get();
        return view('/daftarpeserta',[
            'peserta'=>$peserta
        ]);
    }

    function HalamanCetakAbsen(Request $request){
        $forda = Forda::find($request->session()->get('id'));
        if($forda->tryout_online==1){
        $pesertaWithToken = Paket::select('peserta_id')->get();
        $checkNull= Peserta::where('forda_id',$request->session()->get('id'))->where('status','1')->whereNotIn('id',$pesertaWithToken)->count();
            if($checkNull>0){
                return redirect('/daftar_peserta')->with([
                    'pesan'=>'Ada peserta yang belum mendapatkan token,silahkan request token kepada admin',
                    'tipe'=>'danger'
                ]);
            }
        }
        return view('/cetakabsen');
    }
    function ProsesCetakAbsen(Request $request){
        ini_set('max_execution_time', 300);
        ini_set('memory_limit','512M');
        $forda = Forda::find($request->session()->get('id'));
        $peserta=null;
        if($forda->tryout_online==0){
            $peserta = Peserta::where('forda_id',$request->session()->get('id'))->where('status','1')->get();
        }else{
            $peserta = Paket::where('peserta.forda_id',$request->session()->get('id'))->where('status','1')->join('peserta','peserta.id','=','paket.peserta_id')->get();
        }
        $data = [
            'peserta'=>$peserta,
            'forda'=>$forda
        ];
        $pdf = PDF::loadView('absen', $data)->setPaper('a4', 'portrait');;
        return $pdf->download('absen.pdf');
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

    function ProsesKoreksiTryout(Request $request){
        $JawabanTryOut = $request->except('_token');
       
        JawabanTryout::create($JawabanTryOut);
        return redirect('/koreksi_tryout')->with([
            'message'=>'Jawaban berhasil disimpan',
            'tipe'=>'success'
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

    function GetJawabanPeserta(Request $request){
        $jawaban =JawabanTryout::where('peserta',$request->peserta);
        if($jawaban->count()>0){
            $data = collect($jawaban->first())->except('id','created_at','updated_at','peserta');
            return response()->json($data, 200);
        }
        else{
            
            return response()->json([
                'message'=>'jawaban tidak ada'
            ],404);
        }
    }
}
