<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeRequest extends Model
{
    protected $table='kode_request';

    protected $fillable=['kode','user_id'];
}
