<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDemo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function industryType()
    {
        return $this->belongsTo(IndustryType::class,'industry_type_id','id');
    }
}
