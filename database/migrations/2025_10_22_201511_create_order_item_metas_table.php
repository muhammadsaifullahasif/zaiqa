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
        Schema::create('order_item_metas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_item_id')->unsigned();
            $table->string('meta_key')->nullable();
            $table->text('meta_value')->nullable();
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
            $table->unique(['order_item_id', 'meta_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item_metas');
    }
};
