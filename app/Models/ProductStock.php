<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductStock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_sizes(): BelongsTo
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
