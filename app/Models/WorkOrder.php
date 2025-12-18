<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'organization_id',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Quote>
     */
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Organization>
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
