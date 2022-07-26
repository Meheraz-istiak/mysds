<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;

    protected $table = "chemical";
    protected $fillable = ['id','chemical_Name','product_code','product_indentifier',
        'cas_id','physical_form_id','manufacturer_id','supplier_id','hazard_id','ghs_label_id',
        'active_yn','remarks','remarks','che_image','che_sds_image','che_sds_bn_image'];
    protected $primaryKey = "id";

    public function physicalForm()
    {
        return $this->belongsTo(l_physicalForm::class, 'physical_form_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(l_manufacturer::class, 'manufacturer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(l_supplier::class, 'supplier_id');
    }

    public function hazard()
    {
        return $this->belongsToMany(l_hazard::class, 'hazard_id', 'id');
    }
}
