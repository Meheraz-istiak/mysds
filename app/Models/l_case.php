<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class l_case extends Model
{

    protected $table = "l_case";
    protected $fillable = ['id','caseName','ingredient', 'status'];
    protected $primaryKey = "id";

}
