<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class uploadPolicy extends Model
{

    protected $table = "policy_upload";
    protected $fillable = ['id','policy_name','policy_file', 'insertBy'];
    protected $primaryKey = "id";

}
