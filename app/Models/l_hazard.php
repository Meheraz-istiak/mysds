<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class l_hazard extends Model
{
    use HasFactory;

    protected $table = "l_hazard";
    protected $fillable = ['id','hazardName','hazardType','image'];
    protected $primaryKey = "id";

}
