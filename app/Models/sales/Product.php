<?php

namespace App\Models\sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $guarded = [];
    use HasFactory;

    public function customer(){
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
