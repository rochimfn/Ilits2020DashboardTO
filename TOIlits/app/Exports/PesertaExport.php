<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Forda;
use App\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PesertaExport implements FromView
{
    public function view(): View
    {
        $peserta = Peserta::select('forda_id')->get()->toArray();
        
        $pesertaperforda = Forda::selectRaw('forda.nama AS nama,
        forda.daerah AS asal,
        count(peserta.id) AS total,
        sum(case when status = 1 then 1 else 0 end) AS pesertaterkonfirmasi'
        )
        ->join('peserta','peserta.forda_id','=','forda.id')
        ->whereIn('forda.id',$peserta)
        ->groupBy('forda.id','forda.nama','forda.daerah')->get();
        
        $pesertaseindonesia = Peserta::selectRaw('count(peserta.id) AS total,
        sum(case when status = 1 then 1 else 0 end) AS terkonfirmasi')->get();
        
        return view('admin.superuser.exceldaftarpeserta',[
            'pesertaseindonesia' => $pesertaseindonesia,
            'peserta'=>$pesertaperforda
        ]);
    }
}
