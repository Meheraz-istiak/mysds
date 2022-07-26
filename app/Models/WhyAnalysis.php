<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyAnalysis extends Model
{
    use HasFactory;
    protected $table = "why_analysis";
    protected $fillable = ['id','l_employee_id','why1','why2', 'why3', 'why4', 'why5', 'rootCause', 'reOccurrence'];
    protected $primaryKey = "id";
}
