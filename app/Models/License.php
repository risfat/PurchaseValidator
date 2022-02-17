<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'expired_at',
        'type',
        'license_key',
        'domain',
        'status',
        'product_id',
        'buyer_id'
    ];
}
