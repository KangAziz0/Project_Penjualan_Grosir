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
        Schema::create('tdetailjual', function (Blueprint $table) {
            $table->id();
            $table->string('Notrans',50);
            $table->unsignedBigInteger('harga_awal');
            $table->unsignedBigInteger('harga_jual');
            $table->unsignedBigInteger('qty');
            $table->unsignedBigInteger('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tdetailjual');
    }
};
