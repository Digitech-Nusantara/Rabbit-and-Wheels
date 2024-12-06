<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Discount extends Model
{
	public function products(): HasOne {
		return $this->hasOne(Product::class, 'discount_id');
	}
}
