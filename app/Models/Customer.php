<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "customer";

    public function type()
    {
        return $this->hasOne(CustomerType::class, 'id', 'type_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'customer_id', 'id');
    }
}
