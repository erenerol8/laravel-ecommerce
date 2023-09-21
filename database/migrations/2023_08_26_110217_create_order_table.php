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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->default(1);
            $table->decimal('order_price', 10, 4);
            $table->string('status', 30)->nullable();
            $table->softDeletes();
            $table->string('firstname_lastname',50)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone_number',15)->nullable();
            $table->string('mobil_number',15)->nullable();

            $table->string('bank', 20)->nullable();
            $table->unique('basket_id');
            $table->unsignedBigInteger('basket_id');
            $table->integer('installments')->nullable();
            $table->foreign('basket_id')->references('id')->on('basket')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
