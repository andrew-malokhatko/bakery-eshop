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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('created');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('total_price', 8, 2)->default(0);
            $table->json('customer_data')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('delivery_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
