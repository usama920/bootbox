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
            $table->string('product_name')->nullable(false);
            $table->string('product_slug')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('product_price')->nullable(false);
            $table->boolean('status')->nullable(false)->default(0)->comment('0 for show, 1 for hide');
            $table->foreignId('sub_categories_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('styles_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('genders_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('materials_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('tier_levels_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('safety_resistances_id')->nullable(true)->constrained()->onDelete('cascade');
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
