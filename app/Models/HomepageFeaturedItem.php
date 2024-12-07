<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageFeaturedItem extends Model
{
    use HasFactory;
    protected $table = "homepage_featured_products";

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
