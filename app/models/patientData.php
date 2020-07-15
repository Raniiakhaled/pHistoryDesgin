<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class patientData extends Model
{
    protected $fillable = [
        'width',
        'height',
        'blood',
        'agree_name',
        'allergi_data',
        // 'severity',
        // 'reaction',
        'surgery_data',
        'medication_name',
        'rocata_file',
        'rays_file',
        'analzes_file',
        'colonscopy',
        'colonscopy_data',
        'mammogram',
        'mammogram_data',
        'prc',
        'prc_data',
        'alcohol_type',
        'alcohol_severity',
        'cigarettes',
        'tobacco',
        'drug',
        'mother',
        'other_mother',
        'father',
        'other_father',
        'sister',
        'other_sister',
        'brother',
        'other_brother',
        'grnadmaM',
        'other_grnadmaM',
        'grandmaF',
        'other_grandmaF',
        'grnadpaM',
        'other_grnadpaM',
        'grnadpaF',
        'other_grnadpaF',
        'wife_Period_Cycle',
        'wife_Abotion',
        'wife_Contraceptive',
        'mother_Period_Cycle',
        'mother_pregnency',
        'mother_abotion',
        'mother_deliveries',
        'mother_complicetion',
        'mother_Contraceptive',
        'online',
        'single_Period_Cycle',
        'patient_id',


    ];
    public function patient(){
        return $this->belongsTo("App\models\Patien","patient_id");
    }
}
