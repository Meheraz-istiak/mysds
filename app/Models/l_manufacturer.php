<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class l_manufacturer extends Model
{

    protected $table = "l_manufactures";
    protected $fillable = ['id','name', 'address', 'contactNo','email', 'status'];
    protected $primaryKey = "id";

}
