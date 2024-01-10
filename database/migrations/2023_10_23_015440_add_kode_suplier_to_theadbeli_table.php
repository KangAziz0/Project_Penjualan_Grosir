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
        Schema::table('theadbeli', function (Blueprint $table) {
            $table->unsignedBigInteger('id_suplier')->after('tanggal')->required();
            $table->foreign('id_suplier')->references('id')->on('tsuplier')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('theadbeli', function (Blueprint $table) {
            $table->dropColumn('id_suplier');
            $table->dropForeign('id_suplier');
        });
    }
};
