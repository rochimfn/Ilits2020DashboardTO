<?php

namespace App\Http\Controllers;

use App\Forda;
use App\KodeRequest;
use App\Peserta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use \Exception;

class AuthController extends Controller
{
    public function HalamanRegister(Request $request)
    {
        if (!$request->session()->get('login')) {
            $forda = Forda::get();
            return view('register', [
                'forda' => $forda,
            ]);
        }
        return redirect('/');
    }

    public function HalamanLupaPassword(Request $request)
    {
        if (!$request->session()->get('login')) {
            return view('lupapassword');
        }
        return redirect('/');
    }

    public function HalamanResetPassword(Request $request)
    {

        if (!$request->session()->get('login')) {
            if (AuthController::CekKode($request->c)) {
                return view('resetpassword', [
                    'kode' => $request->c,
                ]);
            }
        }
        return redirect('/');
    }

    public function HalamanGantiPassword()
    {
        return view('gantipassword');
    }

    public function ProsesGantiPassword(Request $request)
    {
        if ($request->session()->get('role') == 'peserta') {
            $peserta = Peserta::where('id', $request->session()->get('id'))->first();
            $user = User::where('id', $peserta->user_id)->first();
        } elseif ($request->session()->get('role') == 'forda') {
            $forda = Forda::where('id', $request->session()->get('id'))->first();
            $user = User::where('id', $forda->user_id)->first();
        } else {
            $user = User::where('id', $request->session()->get('id'))->first();
        }

        if (Hash::check($request->input('passwordlama'), $user->password)) {
            $user->update([
                'password' => Hash::make($request->input('passwordbaru')),
            ]);
            return redirect('/ganti_password')->with(['pesan' => 'Berhasil mengubah password', 'tipe' => 'success']);
        } else {
            return redirect('/ganti_password')->with(['pesan' => 'Password lama tidak cocok', 'tipe' => 'danger']);
        }
    }

    public function ProsesRequestLupaPassword(Request $request)
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
                    'user_id' => $user->first()->id,
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

    public function ProsesResetPassword(Request $request)
    {
        if (!$request->session()->get('login')) {
            if (AuthController::CekKode($request->input('kode'))) {
                $kode = KodeRequest::where('kode', $request->input('kode'))->first();

                $user = User::where('id', $kode->user_id)->first();
                $user->update(['password' => Hash::make($request->input('password'))]);
                $kode->delete();

                return redirect('/')->with(['pesan' => 'Reset Password Berhasil', 'tipe' => 'success']);
            }
        }
        return redirect('/');
    }

    public function ProsesRegister(Request $request)
    {
        try {
            User::create([
                'role' => 'peserta',
                'username' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
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
                'pilihan_tryout' => $request->input('pilihan_tryout'),
                'status' => '0',

            ]);

            return redirect('/')->with(['pesan' => 'Pendaftaran Berhasil', 'tipe' => 'success']);} catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect('/register')->with(['pesan' => 'Email sudah digunakan', 'tipe' => 'danger']);
            }
        }
    }

    public function ProsesLogin(Request $request)
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
                        'role' => 'peserta',
                    ]);

                    return redirect('/notifikasi');
                } elseif ($user->role == 'forda') {
                    $forda = Forda::where('user_id', $user->id)->first();
                    $request->session()->put([
                        'id' => $forda->id,
                        'nama' => $forda->nama,
                        'login' => true,
                        'role' => 'forda',
                    ]);

                    return redirect('/daftar_peserta');
                } elseif ($user->role == 'admin') {
                    $request->session()->put([
                        'id' => $user->id,
                        'nama' => 'admin',
                        'login' => true,
                        'role' => 'admin',
                    ]);

                    return redirect('/dashboard');
                }

            }
        }
        return redirect('/')->with([
            'pesan' => 'Username atau password salah',
            'tipe' => 'danger',
        ]);
    }

    public function CekKode($kode)
    {
        $k = KodeRequest::where('kode', $kode)->count();
        if ($k > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function GetLocation($id)
    {
        $forda = Forda::select('daerah')->where('id', $id)->first();
        echo $forda;
    }
}
