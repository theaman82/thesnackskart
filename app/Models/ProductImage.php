<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
     protected $fillable = [
        'product_id',
        'variant_id',
        'image_url',
        'is_primary',
    ]; 

   public function product()
{
    return $this->belongsTo(Product::class, 'product_id'); // ✅ correct
}

    public function variant()
{
    return $this->belongsTo(ProductVariant::class, 'variant_id'); // ✅ correct
}
}
