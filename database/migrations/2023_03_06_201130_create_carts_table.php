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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('products_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('sizes_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('subscriptions_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->string('total_price')->nullable(true);
            $table->string('subscription_price')->nullable(true);
            $table->integer('quantity')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
