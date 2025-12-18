<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'organization_id',
        'base_price',
        'status',
        'scope_summary',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<ServiceRequest>
     */
    public function request()
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Organization>
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<QuoteLineItem>
     */
    public function lineItems()
    {
        return $this->hasMany(QuoteLineItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<WorkOrder>
     */
    public function workOrder()
    {
        return $this->hasOne(WorkOrder::class);
    }
}
