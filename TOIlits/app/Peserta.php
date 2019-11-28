<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table="peserta";
    protected $fillable=['nama','user_id','token','asal_sekolah','forda_id','no_wa','bukti_bayar','status','kartu_pelajar','pilihan_tryout'];
}
