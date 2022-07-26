<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class g_committe extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(l_employee::class, 'employee_id');
    }
}
