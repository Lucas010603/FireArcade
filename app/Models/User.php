<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "user";

    public function role()
    {
        return $this->hasOne(UserRole::class, "id", "role_id");
    }
}
