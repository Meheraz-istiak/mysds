<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class l_ppe extends Model
{
    use HasFactory;

    protected $table = "l_ppe";
    protected $fillable = ['id','ppeName','image'];
    protected $primaryKey = "id";

}
