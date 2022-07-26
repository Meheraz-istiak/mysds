<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentifyInjuredPart extends Model
{
    use HasFactory;
    protected $table = "identify_injured_part";
    protected $fillable = ['id','l_employee_id','head','right_toe', 'burn', 'sprain', 'left_toe', 'right_eye', 'neck', 'bruise', 'fracture', 'left_eye', 'right_ear', 'back', 'concussion', 'foreign_body', 'left_ear', 'right_arm', 'right_chest', 'laceration', 'amputation', 'left_arm', 'left_chest', 'right_hand', 'internal', 'crush', 'rash', 'left_hand', 'right_hand_finger', 'abdomen', 'eclectic_shock', 'inhalation', 'left_hand_finger', 'right_leg', 'right_groin', 'hernia', 'abrasion', 'left_leg', 'left_groin', 'right_knee', 'right_shoulder', 'tendinitis', 'left_knee', 'left_shoulder', 'right_foot', 'left_shoulder', 'right_foot', 'right_ankle', 'strain', 'left_foot', 'left_ankle', 'hip', 'others1', 'others2'];
    protected $primaryKey = "id";




}
