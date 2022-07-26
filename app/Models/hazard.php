<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class hazard extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = "hazards";

    public function c_jobData()
    {
        return $this->belongsTo(c_job::class,'job_activity_id','id');
    }

    public function departmentData()
    {
        return $this->belongsTo(Department::class,'depertment_id','id');
    }


}
