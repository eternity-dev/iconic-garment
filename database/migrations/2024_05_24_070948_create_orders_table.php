<?php

use App\Models\Customer;
use App\Models\Garment;
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
            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(Garment::class);
            $table->uuid('code');
            $table->integer('total_price');
            $table->integer('total_qty');
            $table->text('note')->nullable();
            $table->enum('status', ['Pending', 'Rejected', 'Approved', 'On Process', 'Completed']);
            $table->timestamps();
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
