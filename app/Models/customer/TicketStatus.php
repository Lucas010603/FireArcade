<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "ticket_status";

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'status_id', 'id');
    }
}
