<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "customer_type";

    public function customers()
    {
        return $this->hasMany(Customer::class, 'type_id', 'id');
    }
}
