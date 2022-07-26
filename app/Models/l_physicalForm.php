<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class l_physicalForm extends Model
{

    protected $table = "l_physical_form";
    protected $fillable = ['id','physicalform', 'status'];
    protected $primaryKey = "id";

}
