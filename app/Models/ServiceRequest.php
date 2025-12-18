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
        'service_category',
        'service_name',
        'description',
        'path',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Quote>
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class, 'request_id');
    }
}
