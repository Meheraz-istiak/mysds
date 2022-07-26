<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hazard;
use App\Models\I_hirarc;


class c_job extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $fillable = ['id', 'depertment_id','company_id', 'job_activity', 'image'];
    protected $table = "c_jobs";


    public function hazard()
    {
      return $this->hasMany(hazard::class,'job_activity_id','id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'depertment_id','id', 'hazardData');
    }


   // public function hezardDetails()
   // {
   //  return $this->hasMany(hazard::class,'job_activity_id','id');
   // }

   // public function  hirarcdetails(){
   //  return $this->belongsTo(I_hirarc::class,'hirarc_id','id');
   // }

}
