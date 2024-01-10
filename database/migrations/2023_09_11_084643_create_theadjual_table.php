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
        Schema::create('theadjual', function (Blueprint $table) {
            $table->id();
            $table->string('notrans',50);
            $table->date('tanggal');
            $table->unsignedBigInteger('totalbayar');
            $table->unsignedBigInteger('bayar');
            $table->unsignedBigInteger('kembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theadjual');
    }
};
