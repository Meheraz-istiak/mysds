<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class create_inspection extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = "create_inspections";

    public function country()
    {
        return $this->belongsTo(l_country::class,'location', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(l_employee::class,'pic', 'id');
    }



//    public function getallData(){
//        $list =  DB::table('create_inspections')
//            ->join('l_employees','create_inspections.pic','l_employees.id')
//            ->join('l_country','create_inspections.location','l_country.id')
//            ->select('create_inspections.*','l_employees.em_name','l_country.country')->get()->toArray();
//
//        return $list;
//
//    }



}

