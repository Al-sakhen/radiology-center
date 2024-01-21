<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name',
    'national_number',
    'phone',
    'DOB',
    'address'];

    public function register(){

        return $this->haseOne(Register::class);
    }
}
