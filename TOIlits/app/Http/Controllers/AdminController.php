<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kalender;
class AdminController extends Controller
{
    function HalamanAturKalender(){
        $event = Kalender::orderBy('tgl','asc')->get();
        return view('admin.superuser.atur_kalender',[
            'event'=>$event
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
}
