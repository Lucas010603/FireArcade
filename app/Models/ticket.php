<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "ticket";
}
