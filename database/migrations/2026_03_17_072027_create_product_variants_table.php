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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('sku')->unique();
            $table->string('flavor')->nullable();     // Peri Peri, Pudina
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('weight_unit')->default('g'); // g, kg
            $table->string('pack_type')->nullable(); // pouch, jar
            $table->decimal('mrp', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
