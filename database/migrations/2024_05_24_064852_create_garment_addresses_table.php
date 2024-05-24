<?php

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
        Schema::create('garment_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Garment::class);
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('zip', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garment_addresses');
    }
};
