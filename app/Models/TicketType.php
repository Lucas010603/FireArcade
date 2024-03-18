<?php

namespace App\Models;

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
