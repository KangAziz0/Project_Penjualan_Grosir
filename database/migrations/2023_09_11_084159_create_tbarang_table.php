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
        Schema::create('tbarang', function (Blueprint $table) {
            $table->id('id_barang')->required();
            $table->string('nama_barang',20)->required();
            $table->unsignedBigInteger('harga_awal')->required();
            $table->unsignedBigInteger('harga_jual')->required();
            $table->unsignedBigInteger('stok')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbarang');
    }
};
