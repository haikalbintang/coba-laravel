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
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->string('image');
            $table->boolean('is_sold')->default(false);
            $table->enum('status', ['baru', 'bekas'])->nullable();
            $table->enum('gender', ['male', 'female', 'kids','unisex', null])->nullable();
            $table->enum('category', ['tas', 'baju', 'celana', 'rok', 'sepatu', 'topi', 'kacamata', 'handphone', 'televisi', 'monitor', 'laptop', 'keyboard', 'mouse', 'kursi', 'sofa', 'kasur', 'meja', 'lainnya'])->nullable();
            $table->foreignId('user_id')->default(1)->constrained()->onDelete('cascade');
            $table->timestamps();
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
