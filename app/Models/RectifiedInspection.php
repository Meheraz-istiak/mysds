<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RectifiedInspection extends Model
{
    use HasFactory;
    protected $guarded = [''];
  


   public function findInsp()
    {
        return $this->belongsTo(create_inspection::class,'find_inspection', 'id');
    }
}
