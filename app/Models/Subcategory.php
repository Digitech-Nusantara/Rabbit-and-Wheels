<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
	public function products(): HasMany {
		return $this->hasMany(Product::class, 'subcategory_id');
	}

	public function categories(): BelongsTo {
		return $this->belongsTo(Category::class);
	}
}
