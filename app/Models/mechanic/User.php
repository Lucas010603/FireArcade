<?php

namespace App\Models\mechanic;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "user";
    use HasFactory;

    public function role()
    {
        return $this->hasOne(User_role::class, "id", "role_id");
    }
}