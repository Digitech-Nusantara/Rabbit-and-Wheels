<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
	public function subcategories(): BelongsTo {
		return $this->belongsTo(Subcategory::class);
	}

	public function discounts(): BelongsTo {
		return $this->belongsTo(Discount::class);
	}

	public function transaction_details(): HasMany {
		return $this->hasMany(TransactionDetails::class, 'product_id');
	}

	public function reviews(): HasMany {
		return $this->hasMany(Review::class, 'product_id');
	}

	public function scopeFilter(Builder $query, array $filters): void {
		if ($filters['search'] ?? false){
			$query->where('products.name', 'like', '%' . request('search') . '%');
		};
	}
}
