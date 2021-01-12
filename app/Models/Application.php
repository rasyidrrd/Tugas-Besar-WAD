<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    
    public function vacancies(){
        return $this->belongsTo('App\Models\Vacancies','vacancies_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
