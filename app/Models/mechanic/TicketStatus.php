<?php

namespace App\Models\mechanic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "ticket_status";
    use HasFactory;

    public function ticket()
    {
        return $this->hasMany(Ticket::class, "id", "status_id");
    }
}
