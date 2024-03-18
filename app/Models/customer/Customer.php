<?php

namespace App\Models\customer;

use App\Models\admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
