<?php

namespace App\Models\mechanic;

use App\Models\mechanic\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
    protected $table = "ticket";
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            $model->created_at = $model->asDateTime($model->created_at);
            $model->updated_at = $model->asDateTime($model->updated_at);
        });
    }

    public function status()
    {
        return $this->hasOne(TicketStatus::class, "id", "status_id");
    }

    public function type()
    {
        return $this->hasOne(TicketType::class, "id", "type_id");
    }

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
