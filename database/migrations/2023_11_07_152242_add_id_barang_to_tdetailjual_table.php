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
        Schema::table('tdetailjual', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang')->after('notrans')->required();
            $table->foreign('id_barang')->references('id_barang')->on('tbarang')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tdetailjual', function (Blueprint $table) {
            $table->dropColumn('id_barang');
            $table->dropForeign('id_barang');
        });
    }
};
