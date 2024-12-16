<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
	public function customers(): BelongsTo {
		return $this->belongsTo(Customer::class);
	}

	public function products(): BelongsTo {
		return $this->belongsTo(Product::class);
	}
}
