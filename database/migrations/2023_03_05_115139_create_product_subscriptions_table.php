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
        Schema::create('product_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->constrained()->onDelete('cascade');
            $table->foreignId('subscriptions_id')->constrained()->onDelete('cascade');
            $table->integer('price')->nullable();
            $table->boolean('status')->default(0)->comment('0 for uncheck, 1 for check');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_subscriptions');
    }
};
