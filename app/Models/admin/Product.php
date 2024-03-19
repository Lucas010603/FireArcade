<?php

namespace App\Models\admin;

use App\Models\customer\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "product";
    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'product_id', 'id');
    }
}
