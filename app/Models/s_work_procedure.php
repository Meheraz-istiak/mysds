<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_work_procedure extends Model
{
    use HasFactory;
    public function ppe()
    {
        return $this->belongsTo(l_ppe::class, 'ppe');
    }
}
