<?php

namespace App\Models\sales;

use App\Models\admin\UserRole;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    public $timestamps = false;
    protected $table = "user";
    use HasFactory;

    public function role()
    {
        return $this->hasOne(UserRole::class, "id", "role_id");
    }
}
