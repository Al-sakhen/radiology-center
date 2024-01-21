<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['center_name','center_description','doctor_name','center_address','center_phone','description','register_id'];

    public function Register(){

        return $this->hasOne(Register::class,'id','register_id');
    }
}


