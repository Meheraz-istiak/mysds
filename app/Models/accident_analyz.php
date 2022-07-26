<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accident_analyz extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function employee()
    {
        return $this->belongsTo(l_employee::class, 'employee_id');
    }
}
