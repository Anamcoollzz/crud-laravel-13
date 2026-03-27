<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PosOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'total_items',
        'total_amount',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(PosOrderItem::class);
    }
}
