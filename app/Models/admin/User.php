<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "user";
    use HasFactory;

    public function role()
    {
        return $this->hasOne(UserRole::class, "id", "role_id");
    }
}
