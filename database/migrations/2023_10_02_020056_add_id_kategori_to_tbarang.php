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
        Schema::table('tbarang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori')->after('nama_barang')->required();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbarang', function (Blueprint $table) {
            $table->dropColumn('id_kategori');
            $table->dropForeign('id_kategori');
        });
    }
};
