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
        Schema::create('theadbeli', function (Blueprint $table) {
            $table->id();
            $table->string('notrans',30);
            $table->date('tanggal');
            $table->unsignedBigInteger('totalitem');
            $table->unsignedBigInteger('totalharga');
            $table->unsignedBigInteger('totalbayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theadbeli');
    }
};
