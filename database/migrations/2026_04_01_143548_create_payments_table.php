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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            $table->enum('payment_method', ['cod', 'razorpay']);
            $table->string('currency')->default('INR');

            $table->decimal('amount', 10, 2);        // paid amount
            $table->decimal('order_amount', 10, 2);  // original order

            $table->enum('payment_status', ['pending', 'success', 'failed', 'refunded'])->default('pending');

            $table->timestamp('paid_at')->nullable();

            // Razorpay fields
            $table->string('razorpay_payment_id')->nullable();
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_signature')->nullable();

            $table->json('gateway_response')->nullable();

            $table->text('notes')->nullable();
            $table->text('failure_reason')->nullable();
            $table->integer('retry_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
