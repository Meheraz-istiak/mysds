<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyCommittee extends Model
{
    use HasFactory;
    protected $table = "safety_committees";
    protected $fillable = ['employee_id', 'designation','photo'];
    protected $primaryKey = "id";

}
