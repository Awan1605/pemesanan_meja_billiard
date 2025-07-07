<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('meja', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('kapasitas');
            $table->string('lokasi');
            $table->enum('status', ['tersedia', 'terpesan', 'digunakan', 'maintenance']);
            $table->enum('tipe', ['exclusive', 'classic', 'vip'])->default('classic');
            $table->decimal('harga', 10, 2);

            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meja');
    }
};