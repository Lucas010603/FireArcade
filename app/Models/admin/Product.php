<?php

namespace App\Models\admin;

use App\Models\customer\Ticket;
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
