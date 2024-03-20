<?php

namespace App\Models\sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = "customer";
    protected $guarded = [];
    use HasFactory;

    public function type(){
        return $this->hasOne(CustomerType::class, "id", "type_id");
    }
}
