<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "product";

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'product_id', 'id');
    }
}
