<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // OPTIONAL reference (for admin/debug)
            $table->foreignId('address_id')->nullable()->constrained()->nullOnDelete();

            //  SNAPSHOT DATA (IMPORTANT)
            $table->string('customer_name');
            $table->string('phone', 15);

            $table->string('landmark')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('address_line')->nullable();

            $table->string('city');
            $table->string('state');
            $table->string('pincode', 6);

            // Order details
            $table->decimal('total_amount', 10, 2);

            $table->enum('status', [
                'pending',
                'confirmed',
                'processing',
                'shipped',
                'delivered',
                'cancelled'
            ])->default('pending');

            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed'
            ])->default('pending');

            $table->timestamp('placed_at')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
