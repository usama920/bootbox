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
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('contact_email')->nullable(true);
            $table->string('contact_number')->nullable(true);
            $table->string('social_facebook')->nullable(true);
            $table->string('social_instagram')->nullable(true);
            $table->string('social_twitter')->nullable(true);
            $table->string('social_email')->nullable(true);
            $table->text('question_text')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
