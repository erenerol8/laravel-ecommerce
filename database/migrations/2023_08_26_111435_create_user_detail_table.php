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
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();

            $table->unsignedBigInteger('user_id');
            $table->string('address', 200)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('mobil_number', 15)->nullable();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_detail');
    }
};
