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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->default(0);
            $table->string('tier');
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->integer('price_min');
            $table->integer('price_max');
            $table->string('delivery');
            $table->json('features');
            $table->boolean('is_featured')->default(false);
            $table->string('button_text')->default('Get Started');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
