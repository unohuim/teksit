<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteLineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'label',
        'amount',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Quote>
     */
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
