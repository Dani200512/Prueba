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
        Schema::create('orders_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('order_id')->references('id')->on('orders');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_table');
    }
};
