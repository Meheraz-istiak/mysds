<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class l_supplier extends Model
{

    protected $table = "l_supplier";
    protected $fillable = ['suppliername', 'contactNo','email', 'address', 'status'];
    protected $primaryKey = "id";

}
