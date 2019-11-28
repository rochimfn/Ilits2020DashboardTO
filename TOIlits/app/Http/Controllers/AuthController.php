<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forda;
use App\User;
use App\Peserta;
use App\KodeRequest;
use Illuminate\Support\Facades\Hash;
use File;
use Mail;
use \Exception;
class AuthController extends Controller
{
    function HalamanRegister(Request $request)
    {
        if (!$request->session()->get('login')) {
            $forda = Forda::orderBy('nama', 'asc')->get();
            return view('register', [
                'forda' => $forda
            ]);
        }
        return redirect('/');
    }

    function HalamanLupaPassword(Request $request)
    {
        if (!$request->session()->get('login')) {
            return view('lupapassword');
        }
        return redirect('/');
    }

    function HalamanResetPassword(Request $request)
    {

        if (!$request->session()->get('login')) {
            if (AuthController::CekKode($request->c)) {
                return view('resetpassword', [
                    'kode' => $request->c
                ]);
            }
        }
        return redirect('/');
    }
    function ProsesRequestLupaPassword(Request $request)
    {
        $user = User::where('username', $request->input('email'));
        if ($user->count() < 1) {
            return redirect('/lupa_password')->with(['pesan' => 'Email tidak ditemukan', 'tipe' => 'danger']);
        } else {
            try {
                $abjad = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $kode = '';
                for ($i = 0; $i < 6; $i++) {
                    $index = rand(0, strlen($abjad));
                    $huruf = substr($abjad, $index, 1);
                    $kode .= $huruf;
                }
                KodeRequest::create([
                    'kode' => $kode,
                    'user_id' => $user->first()->id
                ]);
                Mail::send('emailhtml', ['kode' => $kode], function ($message) use ($request) {
                    $message->from('ilits.to.2020@gmail.com', 'ILITS 2020');
                    $message->to($request->input('email'));
                    $message->subject('Lupa Password ILITS 2020');
                });
                return redirect('/lupa_password')->with(['pesan' => 'Silahkan cek email anda', 'tipe' => 'success']);
            } catch (Exception $e) {
                return response($e->getMessage(), 400);
            }
        }
    }

    function ProsesResetPassword(Request $request)
    {
        if (!$request->session()->get('login')) {
            if (AuthController::CekKode($request->input('kode'))) {
                $kode = KodeRequest::where('kode',$request->input('kode'))->first();

                $user = User::where('id',$kode->user_id)->first();
                $user->update(['password'=>Hash::make($request->input('password'))]);
                $kode->delete();

                return redirect('/')->with(['pesan'=>'Reset Password Berhasil','tipe'=>'success']);
            }
        }
        return redirect('/');
    }

    function ProsesRegister(Request $request)
    {
        try{
        User::create([
            'role' => 'peserta',
            'username' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $user = User::orderBy('id', 'desc')->first();
        Peserta::create([
            'nama' => $request->input('nama'),
            'user_id' => $user->id,
            'asal_sekolah' => $request->input('asal_sekolah'),
            'forda_id' => $request->input('forda'),
            'no_wa' => $request->input('no_wa'),
            'bukti_bayar' => null,
            'kartu_pelajar' => null,
            'status' => '0',
            'pilihan_tryout'=>$request->input('pilihan_tryout')
        ]);

        return redirect('/')->with(['pesan'=>'Pendaftaran Berhasil','tipe'=>'success']);}
        catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/')->with(['pesan'=>'Email sudah digunakan','tipe'=>'danger']);
            }
        }
    }

    function ProsesLogin(Request $request)
    {
        $user = User::where('username', '=', $request->input('email'))->first();
        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                if ($user->role == 'peserta') {
                    $peserta = Peserta::where('user_id', '=', $user->id)->first();
                    $request->session()->put([
                        'id' => $peserta->id,
                        'nama' => $peserta->nama,
                        'login' => true,
                        'role' => 'peserta'
                    ]);
                    File::put(base_path() . '\config\sidebar.php', "<?php\n return['sidebar_type'=>'3'] ?>");
                    return redirect('/notifikasi');
                } elseif ($user->role == 'forda') {
                    $forda = Forda::where('user_id',  $user->id)->first();
                    $request->session()->put([
                        'id' => $forda->id,
                        'nama' => $forda->nama,
                        'login' => true,
                        'role' => 'forda'
                    ]);
                    File::put(base_path() . '\config\sidebar.php', "<?php\n return['sidebar_type'=>'1'] ?>");
                    return redirect('/daftar_peserta');
                } elseif ($user->role == 'admin') {
                    $request->session()->put([
                        'id' => $user->id,
                        'nama' => 'admin',
                        'login' => true,
                        'role' => 'admin'
                    ]);
                    File::put(base_path() . '\config\sidebar.php', "<?php\n return['sidebar_type'=>'2'] ?>");
                    return redirect('/dashboard');
                }
                
            }
        }
        return redirect('/')->with([
            'pesan' => 'Username atau password salah',
            'tipe' => 'danger'
        ]);
    }

    function CekKode($kode)
    {
        $k = KodeRequest::where('kode', $kode)->count();
        if ($k > 0) {
            return true;
        } else {
            return false;
        }
    }

    function GetLocation($id)
    {
        $forda = Forda::select('daerah')->where('id',$id)->first();
        echo $forda;
    }
}
