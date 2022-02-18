<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_email',
        'user_phone',
        'subject',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignee() {

        return $this->belongsTo(User::class, 'served_by');

    }
}
