<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['id', 'name', 'email', 'password', 'phone', 'status'];



    // ==================== Start Relation ====================
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id', 'id', 'id');
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
