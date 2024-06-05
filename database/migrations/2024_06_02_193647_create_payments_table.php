<?php

use App\Enums\PaymentStatus;
use App\Models\Customer;
use App\Models\Order;
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
        Schema::create('payments', function (Blueprint $table) {
            $paymentStatuses = [
                PaymentStatus::Pending->value,
                PaymentStatus::Success->value
            ];

            $table->id();
            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(Order::class);
            $table->uuid('trx_id');
            $table->integer('amount');
            $table->string('method')->default('BANK_TRANSFER');
            $table->enum('status', $paymentStatuses)->default(PaymentStatus::Pending->value);
            $table->string('proof_image_url');
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
