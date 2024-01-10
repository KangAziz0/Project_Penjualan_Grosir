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
        Schema::table('theadjual', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_petugas')->after('notrans')->required();
            $table->foreign('kode_petugas')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('theadjual', function (Blueprint $table) {
            $table->dropColumn('kode_petugas');
            $table->dropForeign('kode_petugas');
        });
    }
};
