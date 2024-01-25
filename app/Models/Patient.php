<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function register()
    {
        // return $this->hasOne(Register::class);
        return $this->hasMany(Register::class);
    }

    public function reports()
    {
        // we can get the reports throw the register
        return $this->hasManyThrough(Report::class, Register::class)->orderBy('created_at', 'asc');
    }
}
