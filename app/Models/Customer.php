<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
	public function reviews(): HasMany {
		return $this->hasMany(Review::class, 'customer_id');
	}

	public function transactions(): HasMany {
		return $this->hasMany(Transaction::class, 'customer_id');
	}
}
