<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'name',
        'nid',
        'class',
        'faculty',
        'ticket_type',
        'account_type',
        'ticket_detail',
        'answers_pref',
        'answers_ticket',
        'status',
        'file',
    ];
}
