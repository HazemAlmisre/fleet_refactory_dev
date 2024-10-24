<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketMassages extends Model
{
    protected $table = "ticket_messages";
    protected $fillable = [
        'ticket_id',
        'sender_id',
        'message',
        'status',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
