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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservasi_id')->constrained('reservasi');
            $table->foreignId('perpanjangan_id')->nullable()->constrained('perpanjangan');
            $table->decimal('jumlah', 8, 2);
            $table->string('metode_pembayaran');
            $table->string('status_pembayaran');
            $table->timestamp('dibuat_pada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
