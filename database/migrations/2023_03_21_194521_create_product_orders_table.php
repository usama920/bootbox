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
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->constrained()->onDelete('cascade');
            $table->foreignId('products_id')->nullable(false)->constrained()->onDelete('cascade');
            $table->foreignId('subscription_types_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('product_sizes_id')->nullable(false)->constrained()->onDelete('cascade');
            $table->integer('subscription_type')->nullable(true)->comment('0 for monthly, 1 for weekly, 2 for full payment');
            $table->string('status')->comment('1 or delivered, 2 for pending');
            $table->string('strip_price_id');
            $table->float('total_amount');
            $table->float('installment_price');
            $table->string('name');
            $table->string('phone');
            $table->string('address_1');
            $table->string('address_2')->nullable(true);
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_orders');
    }
};
