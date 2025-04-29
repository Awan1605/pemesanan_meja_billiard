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
        Schema::create('menu_admin', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('route');
            $table->string('icon');
            $table->integer('urutan');
            $table->timestamp('dibuat_pada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_admin');
    }
};
