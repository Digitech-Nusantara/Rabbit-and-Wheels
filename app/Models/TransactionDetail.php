<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
	public function transactions(): BelongsTo {
		return $this->belongsTo(Transaction::class);
	}

	public function products(): BelongsTo {
		return $this->belongsTo(Product::class);
	}
}
