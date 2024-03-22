<?php

namespace App\Models\mechanic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];
    protected $table = "product";
    public $timestamps = false;
    use HasFactory;

    public function customer()
    {
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
