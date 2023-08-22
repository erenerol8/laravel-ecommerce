<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unique();
            $table->boolean('show_slider')->default(0);
            $table->boolean('show_daily_deals')->default(0);
            $table->boolean('show_featured')->default(0);
            $table->boolean('show_bestseller')->default(0);
            $table->boolean('show_discounted')->default(0);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_detail');
    }
};
