<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
	public function subcategories(): HasMany {
		return $this->hasMany(Category::class, 'category_id');
	}
}
