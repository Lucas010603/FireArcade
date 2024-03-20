<?php

namespace App\Models\admin;

use App\Models\customer\Customer;
use App\Models\customer\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected array $dates = ['contract_start', 'contract_end'];
    public $timestamps = false;
    protected $table = "product";
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            if (!($model->contract_start || $model->contract_end)) {
                return;
            }
            $model->contract_start = $model->asDateTime($model->contract_start);
            $model->contract_end = $model->asDateTime($model->contract_end);
        });
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'product_id', 'id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
