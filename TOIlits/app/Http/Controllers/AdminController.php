<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PaketExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Paket;
use App\Kalender;
use App\Peserta;
use App\Forda;
use App\User;
class AdminController extends Controller
{
    function HalamanStatistikPeserta(){
        $fordaonline = [7,9,10,11,12,13,18,20,21,25,35];
        $totalpeserta  = Peserta::get()->count();
        $totalpesertaterkonfirmasi  = Peserta::where('status',1)->count();
        $totalpesertaonline = Peserta::whereIn('forda_id',$fordaonline)->count();
        $totalpesertaonlineterkonfirmasi = Peserta::whereIn('forda_id',$fordaonline)->where('status',1)->count();
        $totalpesertaoffline = Peserta::whereNotIn('forda_id',$fordaonline)->count();
        $totalpesertaofflineterkonfirmasi = Peserta::whereNotIn('forda_id',$fordaonline)->where('status',1)->count();
        return view('admin.superuser.statistik',[
            'totalpeserta' => $totalpeserta,
            'totalpesertaterkonfirmasi'=> $totalpesertaterkonfirmasi,
            'totalpesertaonline' => $totalpesertaonline,
            'totalpesertaonlineterkonfirmasi' => $totalpesertaonlineterkonfirmasi,
            'totalpesertaoffline' => $totalpesertaoffline,
            'totalpesertaofflineterkonfirmasi' => $totalpesertaofflineterkonfirmasi,
        ]);
    }
    function HalamanDaftarPeserta(){
        $peserta  = Peserta::selectRaw('forda.nama as namaforda, peserta.nama as nama, user.username as email, paket.token as token, paket.ujian as paket')
            ->join('user', 'user.id', '=', 'peserta.user_id')
            ->join('forda', 'forda.id', '=', 'peserta.forda_id')
            ->join('paket', 'peserta.id', '=', 'paket.peserta_id')
            ->where('forda.tryout_online',1)
            ->where('peserta.status',1)
//            ->whereNotNull('paket.token')
//            ->groupBy('peserta.nama')
            ->orderBy('forda.id', 'DESC')
            ->orderBy('peserta.nama', 'ASC')
            ->get();
        return view('admin.superuser.daftarpeserta',[
            'peserta'=>$peserta
        ]);
    }

    function HalamanAturKalender(){
        $event = Kalender::orderBy('tgl','asc')->get();
        return view('admin.superuser.atur_kalender',[
            'event'=>$event
        ]);
    }

    function HalamanGenerateToken(){
        $pesertaWithToken = Paket::select('peserta_id')->get();
        $fordaNeedToken = Peserta::whereNotIn('id',$pesertaWithToken)->where('status','1')->select('forda_id')->get()->toArray();
        $forda = Forda::selectRaw('forda.id,forda.nama as nama,count(peserta.id) as total')->join('peserta','peserta.forda_id','=','forda.id')->whereIn('forda.id',$fordaNeedToken)->where('peserta.status','1')->where('tryout_online',1)->groupBy('forda.id','forda.nama')->get();

        return view('admin/superuser/generate_token',[
            'forda'=>$forda
        ]);
    }

    function TambahEvent(Request $request){
        $date = \DateTime::createFromFormat('d-m-Y', $request->input('kalender'))->format('Y-m-d');
        Kalender::create([
            'event' => $request->input('event'),
            'tgl'=>$date
        ]);

        return redirect('/atur_kalender');
    }

    function EditEvent(Request $request){
        $date = \DateTime::createFromFormat('d-m-Y', $request->input('editKalender'))->format('Y-m-d');
        $event = Kalender::find($request->input('id'));
        $event->update([
            'event'=>$request->input('editEvent'),
            'tgl'=>$date
        ]);

        return redirect('/atur_kalender');
    }

    function HapusEvent(Request $request){
        $event = Kalender::find($request->input('id'));
        $event->delete();
        return redirect('/atur_kalender');
    }

    function ProsesGenerateToken(Request $request){
        if($request->has('id')){
            $forda="";
            if($request->query('id')<10){
                $forda="0".$request->query('id');
            }else{
                $forda = $request->query('id');
            }
            $pesertaWithToken = Paket::select('peserta_id')->get();
            $peserta = Peserta::whereNotIn('id',$pesertaWithToken)->where('forda_id',$request->query('id'))->where('status',1)->get();
            foreach($peserta as $p){
                $paket = rand(1,5);
                $paketString = ($p->pilihan_tryout==1?'ILITS SAINTEK':'ILITS SOSHUM').($paket==1?'':' '.$paket);
                $pesertaId = "";
                $abjad = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $kode = '';
                $token='';
                if($p->id<10){
                    $pesertaId="0000".$p->id;
                }
                elseif($p->id>=10&&$p->id<100){
                    $pesertaId="000".$p->id;
                }
                elseif($p->id>=100&&$p->id<1000){
                    $pesertaId="00".$p->id;
                }
                elseif($p->id>=1000&&$p->id<10000){
                    $pesertaId="0".$p->id;
                }
                else{
                    $pesertaId=$p->id;
                }

                for ($i = 0; $i < 3; $i++) {
                    $index = rand(0, strlen($abjad));
                    $huruf = substr($abjad, $index, 1);
                    $kode .= $huruf;
                }

                $token="ILITS-".$forda."-".$pesertaId."-".$p->pilihan_tryout."-".$kode;
                Paket::create([
                    'token'=>$token,
                    'ujian'=>$paketString,
                    'peserta_id'=>$p->id
                ]);
            }
            return redirect('/generate_token')->with(
                ['pesan'=>'Token berhasil dibuat',
                'tipe'=>'success']
            );
        }else{
            return redirect('/');
        }
    }
    public function ExcelExport()
	{
		return Excel::download(new PaketExport, 'token.xlsx');
	}
}
