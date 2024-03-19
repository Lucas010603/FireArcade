<?php

namespace App\Models\customer;

use App\Models\admin\Product;
use App\Models\admin\UserRole;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];
    protected $table = "ticket";

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function type()
    {
        return $this->hasOne(TicketType::class, 'id', 'type_id');
    }

    public function status()
    {
        return $this->hasOne(TicketStatus::class, 'id', 'status_id');
    }

    public function user()
    {
        return $this->hasOne(UserRole::class, 'id', 'role_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
