<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Doctor extends Authenticatable
{
    protected $fillable = [
        'image',
        'name',
        'phoneNumber',
        'password',
        'Primary_Speciality',
        'degree',
        'information',
        'national_id_front_side',
        'national_id_back_side',
        'national_id',
        'branch',
        'hosptail_id',
        'clinic_id'];
    public function hosptail(){
        return $this->belongsTo('App\models\Hosptail','hosptail_id');
    }
    public function clinic(){
        return $this->belongsTo('App\models\Clinic','clinic_id');
    }
}
