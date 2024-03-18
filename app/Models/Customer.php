<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Customer extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "customer";
    use HasFactory;


    public function type()
    {
        return $this->hasOne(CustomerType::class, 'id', 'type_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'customer_id', 'id');
    }
}
