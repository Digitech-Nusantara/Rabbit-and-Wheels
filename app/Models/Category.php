<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];  // Menambahkan 'slug' ke dalam fillable

    // Menambahkan logika untuk mengisi slug secara otomatis
    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                // Membuat slug berdasarkan nama kategori
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
	}
}