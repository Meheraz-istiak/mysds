<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    // protected $guarded = [''];
    protected $fillable=['meeting_date','p_member','time','venue','introduction','endorsement','p_member','agenda','pic','remarks','closing'];
    public function present()
    {
        return $this->belongsTo(l_employee::class, 'p_member');
    }
}
