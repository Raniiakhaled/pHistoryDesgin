<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['name','analzes_id','rays_id'];

    public function analzes(){
    	return $this->belongsTo('App\models\patient_analzes','analzes_id');
    }

    public function rays(){
    	return $this->belongsTo('App\models\patient_rays','rays_id');
    }
}
