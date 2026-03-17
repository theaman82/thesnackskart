<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'flavor',
        'weight',
        'weight_unit',
        'pack_type',
        'mrp',
        'sale_price',
        'stock',
        'image',
        'status',
    ];

    protected static function booted(): void
    {
        static::creating(function ($variant) {
            if (blank($variant->sku)) {
                $variant->sku = static::generateUniqueSku();
            }
        });
    }

    public static function generateUniqueSku(): string
    {
        do {
            $sku = str_pad((string) random_int(0, 9999), 4, '0', STR_PAD_LEFT)
                . '-'
                . str_pad((string) random_int(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (static::where('sku', $sku)->exists());

        return $sku;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}