<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "ticket_type";

    public function tickets(){
        $this->hasMany(Ticket::class, 'type_id', 'id');
    }
}
