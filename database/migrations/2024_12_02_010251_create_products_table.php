<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->integer('price');
			$table->integer('size');
			$table->integer('size');
			$table->string('color');
			$table->integer('stock');
			$table->binary('photo', length: 10485760); // Max size of photo file is 10 mb
			$table->string('description');
			$table->foreignId('subcategory_id')->constrained(
				table: 'subcategories', indexName: 'products_subcategory_id'
			);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
