<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChemicalListing extends Model
{
    use HasFactory;
    protected $table = "chemical_listing";
    protected $fillable = ['id', 'chemical_id','ppe_id','usage','employee','no_of_emplyees','quantity',
        'lang','active_yn','sds_issue_date','sds_link','remark','signal_word'];
    protected $primaryKey = "id";

    public function chemical()
    {
        return $this->belongsTo(Chemical::class, 'chemical_id', 'id');
    }
    public function ppe()
    {
        return $this->belongsTo(l_ppe::class, 'ppe_id', 'id');
    }
}
