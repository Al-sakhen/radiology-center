<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id','admin_id',
    'medical_image_id',
    'type',
    'description'];

    public function patiants(){

        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
