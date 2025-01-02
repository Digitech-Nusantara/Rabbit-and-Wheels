<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Kolom yang dapat diisi melalui form
    protected $fillable = [
        'code',
        'name',
        'slug',
        'price',
        'size',
        'color',
        'in_stock',
        'photo',
        'description',
        'subcategory_id',
    ];

    // Relasi dengan subkategori
    public function subcategories(): BelongsTo {
        return $this->belongsTo(Subcategory::class);
    }

    // Relasi dengan diskon
    public function discounts(): BelongsTo {
        return $this->belongsTo(Discount::class);
    }

    // Relasi dengan detail transaksi
    public function transaction_details(): HasMany {
        return $this->hasMany(TransactionDetail::class, 'product_id');
    }

    // Relasi dengan ulasan/reviews
    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'product_id');
    }
}
