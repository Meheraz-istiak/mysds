<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = "departments";

    public function hazardData()
    {
        return $this->hasMany(hazard::class,'depertment_id','id');
    }

//    public function job()
//    {
//        return $this->hasMany(c_job::class,'depertment_id','id');
//    }
}
