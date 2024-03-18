<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "user";

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
