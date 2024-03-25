<?php

namespace App\Models\mechanic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{

    protected $guarded = [];
    public $timestamps = false;
    protected $table = "customer";
    use HasFactory;

    public function Type(): HasOne
    {
        return $this->HasOne(CustomerType::class, 'id', 'type_id');
    }

}
