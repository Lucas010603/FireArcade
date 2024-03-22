<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "user_role";

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
