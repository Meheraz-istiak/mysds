<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcciAnnalysis extends Model
{
    use HasFactory;
    protected $fillable = ['id',
    'inc_number',
    'em_dept', 
    'em_name',
    'em_des',
    'l_of_incident',
    't_of_accident',
    'tim_of_incident',
    'rpt_to_dosh',
    'st_of_invesg',
    'outcom_of_investg',
    'summ_of_incident',
    ];
    protected $primaryKey = "id";

    public function catergorys(){
        return  $this->hasMany(McAnnalysis::class,'mc_annalyses_id','id');
    }
}
