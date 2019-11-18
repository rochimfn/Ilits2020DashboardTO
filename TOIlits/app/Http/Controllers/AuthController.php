<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forda;
use App\User;
use App\Peserta;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    function HalamanRegister(){
        $forda= Forda::get();
        return view('register',[
            'forda'=>$forda
        ]);
    }

    function ProsesRegister(Request $request){
        User::create(['role'=>'peserta',
        'username'=>$request->input('email'),
        'password'=>Hash::make($request->input('password'))
        ]);

        $user = User::orderBy('id','desc')->first();
        Peserta::create([
            'nama'=>$request->input('nama'),
            'user_id'=>$user->id,
            'asal_sekolah'=>$request->input('asal_sekolah'),
            'forda_id'=>$request->input('forda'),
            'no_wa'=>$request->input('no_wa'),
            'status'=>'0'
        ]);

        return redirect('/');
    }

    function ProsesLogin(Request $request){
        $user = User::where('username','=',$request->input('email'))->first();
        if($user){
            if(Hash::check($request->input('password'),$user->password)){
                if($user->role=='peserta'){
                    $peserta=Peserta::where('user_id','=',$user->id)->first();
                    $request->session()->put([
                        'id'=>$peserta->id,
                        'nama'=>$peserta->nama,
                        'login'=>true,
                        'role'=>'peserta'
                    ]);
                }
                return redirect('/dashboard');
            }
        }
        echo "Username atau Password Salah";
    }
}
