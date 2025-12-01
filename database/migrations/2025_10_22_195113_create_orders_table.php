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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('address_id')->unsigned();
            $table->double('order_total', 8, 2);
            $table->string('parent_id')->nullable();
            $table->string('order_type');
            $table->string('order_status')->default('processing');
            $table->enum('active_status', [1, 0])->default(1);
            $table->enum('delete_status', [1, 0])->default(0);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('order_addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
