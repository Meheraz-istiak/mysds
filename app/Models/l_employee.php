<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class l_employee extends Model
{
    use HasFactory;
    protected $table = "l_employees";
    protected $fillable = [
        'em_name',
        'em_designation',
        'em_department',
        'em_ic_passport_no',
        'em_mail',
        'em_phone',
        'em_country',
        'em_j_date',
        'em_profile',
        'em_status'
    ];

}
