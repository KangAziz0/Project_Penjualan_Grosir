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
        Schema::create('tpetugas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_petugas',20);
            $table->string('nama_petugas',20);
            $table->string('jenis_kelamin',20);
            $table->text('alamat');
            $table->string('jabatan',30);
            $table->string('agama',30);
            $table->string('no_telepon',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tpetugas');
    }
};
