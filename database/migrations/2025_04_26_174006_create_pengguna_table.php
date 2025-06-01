<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nomor_telepon', 20);
            $table->string('role')->default('pengguna');
            $table->timestamp('dibuat_pada')->nullable();
            // tidak perlu updated_at karena di model sudah di-set null
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
