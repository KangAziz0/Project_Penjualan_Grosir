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
        Schema::create('tsuplier', function (Blueprint $table) {
            $table->id();
            $table->string('kode_suplier')->unique()->required();
            $table->string('nama_suplier',50)->required();
            $table->text('alamat')->required();
            $table->string('no_telepon')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsuplier');
    }
};
