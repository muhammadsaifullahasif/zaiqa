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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('parent_id')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('sub_category_id')->unsigned()->nullable();
            $table->enum('type', ['simple', 'variable', 'variation'])->default('simple');
            $table->string('status')->default('draft');
            $table->enum('active_status', [1, 0])->default(1);
            $table->enum('delete_status', [1, 0])->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
