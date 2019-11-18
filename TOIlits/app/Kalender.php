<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    protected $table="kalender";
    protected $fillable=['tgl','event'];
}
