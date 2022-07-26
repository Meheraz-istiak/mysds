<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table = "company_profile";
    protected $fillable = ['id', 'user_name','password','company_name','contact_person','mobile_number','address', 'web_url','country','state','city','postal_code'];
    protected $primaryKey = "id";
}
