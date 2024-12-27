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
        Schema::create('db_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori');
            $table->string('kapasitas penumpang');
            $table->string('tarif sewa');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('db_mobil');
    }
};
