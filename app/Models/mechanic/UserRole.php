<?php

namespace App\Models\mechanic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "user_role";
    use HasFactory;
}
