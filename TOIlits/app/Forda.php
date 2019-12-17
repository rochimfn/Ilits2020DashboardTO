<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forda extends Model
{
    protected $table="forda";
    protected $fillable=["id","nama_forda","user_id","daerah","id_line","uname_ig","nama_ketua","nrp","hp_ketua","id_line_ketua","nama_perwakilan","hp_perwakilan","id_line_perwakilan","tryout_online"];
}
