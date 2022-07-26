<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class l_ghslabel extends Model
{
    use HasFactory;

    protected $table = "l_ghslabel";
    protected $fillable = ['id','ghsName','image'];
    protected $primaryKey = "id";

}
