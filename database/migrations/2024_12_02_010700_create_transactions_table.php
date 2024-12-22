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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->integer('total_price');
            $table->integer('total_payment');
            $table->foreignId('admin_id')->constrained(
				table: 'users', indexName: 'transactions_admin_id'
			);
			$table->foreignId('customer_id')->constrained(
				table: 'customers', indexName: 'transactions_customer_id'
			);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
