<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Peserta;
use Image;
use File;
class PesertaController extends Controller
{
    function HalamanBukti(Request $request){
        $peserta = Peserta::where('id',$request->session()->get('id'))->first();
        $sudahupload=false;
        if($peserta->bukti_bayar!=null&&$peserta->kartu_pelajar!=null){
            $sudahupload=true;
        }
        return view('admin/peserta/buktipembayaran',[
            'peserta'=>$peserta,
            'sudahupload'=>$sudahupload
        ]);
    }
    function ProsesUploadBukti(Request $request){
        if($request->file('input-pelajar')->getSize()>204800||$request->file('input-bukti')->getSize()>204800){
            return redirect('bukti_pembayaran')->with([
                'pesan'=>'Ukuran file melebihi batas',
                'tipe'=>'warning'
            ]);
        }
        if (!File::isDirectory(public_path().'/images/kartupelajar')) {
            
            File::makeDirectory(public_path().'/images/kartupelajar');
        }
        if (!File::isDirectory(public_path().'/images/bukti')) {
            
            File::makeDirectory(public_path().'/images/bukti');
        }
        $pelajar = $request->file('input-pelajar');
        $pelajarName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $pelajar->getClientOriginalExtension();
        Image::make($pelajar)->save(public_path().'/images/kartupelajar' . '/' . $pelajarName);

        $bukti = $request->file('input-bukti');
        $buktiName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $bukti->getClientOriginalExtension();
        Image::make($bukti)->save(public_path().'/images/bukti' . '/' . $buktiName);

        Peserta::where('id','=',$request->session()->get('id'))->update(['bukti_bayar'=>$buktiName,'kartu_pelajar'=>$pelajarName]);
        return redirect('bukti_pembayaran')->with([
            'pesan'=>'Upload sukses,silahkan menunggu konfirmasi dari forda masing-masing',
            'tipe'=>'success'
        ]);
    }
}
