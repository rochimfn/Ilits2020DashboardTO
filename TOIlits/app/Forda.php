<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forda extends Model
{
    protected $table="forda";
    protected $fillable=["id","nama_forda","user_id"];
}
