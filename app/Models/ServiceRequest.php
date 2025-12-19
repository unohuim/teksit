<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'audience_type',
        'service_category',
        'description',
        'calendly_event_uri',
        'calendly_invitee_uri',
        'calendly_event_uuid',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Quote>
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class, 'request_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'request_id');
    }
}
