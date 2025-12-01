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
        Schema::create('transaction_metas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id')->unsigned();
            $table->string('meta_key')->nullable();
            $table->text('meta_value')->nullable();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->unique(['transaction_id', 'meta_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_metas');
    }
};
