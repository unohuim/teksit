<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'amount_cents',
        'currency',
        'provider',
        'status',
        'reference',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function request()
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }
}
