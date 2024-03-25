<?php

namespace App\Models\mechanic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];
    protected $table = "product";
    public $timestamps = false;
    protected $dates = ['contract_start', 'contract_end'];
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            if (!$model->contract_start || !$model->contract_end) {
                return;
            }
            $model->contract_start = $model->asDateTime($model->contract_start);
            $model->contract_end = $model->asDateTime($model->contract_end);
        });
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
