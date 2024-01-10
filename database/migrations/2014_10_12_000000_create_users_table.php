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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('kode_petugas',30);
            $table->string('nama_petugas');
            $table->string('jenis_kelamin');
            $table->string('Alamat');
            $table->enum('role',['Admin','Petugas'])->default('Admin');
            $table->string('agama',40);
            $table->string('no_telepon',30);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
