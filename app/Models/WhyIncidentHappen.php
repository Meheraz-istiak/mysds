<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class WhyIncidentHappen extends Model

{

    use HasFactory;

    protected $table = "why_incident_happen";

    protected $fillable = ['id','incidence_number','in_guard','operating_permission','hazard', 'techniques', 'device_defective', 'swp', 'equipment_defective', 'device_inoperative', 'layout_hazardous', 'defective_equipment', 'unsafe_lighting', 'unapproved_way', 'unsafe_ventilation', 'lifting_hand', 'protective_equipment', 'wrong_posture', 'appropriate_equipment', 'horseplay', 'chemical_handling', 'insufficient_training', 'available_equipment', 'others1', 'others2', 'unsafe_conditions', 'unsafe_acts', 'prior_incident', 'similar_incidents'];

    protected $primaryKey = "id";



//public static function boot()

//{

  //  parent::boot();

//    self::creating(function ($model) {

    //    $model->WhyIncidentHappen= IdGenerator::generate(['table' => $this->why_incident_happen, 'length' => 6, 'prefix' =>'AC-']);

  //  });

//}

}

