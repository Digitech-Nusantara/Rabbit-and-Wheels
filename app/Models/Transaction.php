<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
	public function transaction_details(): HasMany {
		return $this->hasMany(TransactionDetail::class, 'transaction_id');
	}

	public function user(): BelongsTo {
		return $this->BelongsTo(User::class);
	}

	public function customers(): BelongsTo {
		return $this->BelongsTo(Customer::class);
	}
}
