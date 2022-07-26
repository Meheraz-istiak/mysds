<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class s_rule extends Model
{

    protected $guarded = [' '];

    protected $table = "s_rules";


    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(l_employee::class, 'employee_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
    public function company()
    {
        return $this->belongsTo(CompanyProfile::class, 'company_id');
    }

}
