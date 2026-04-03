<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('phone', 15);
            $table->string('alt_phone', 15)->nullable();
            $table->enum('address_type', ['home', 'office', 'other'])->nullable();
            $table->string('landmark')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('address_line')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('pincode', 6);
            $table->boolean('is_default')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
