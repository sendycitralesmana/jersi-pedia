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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga')->default(125000);
            $table->integer('harga_nameset')->default(50000);
            $table->boolean('is_ready')->default(true);
            $table->string('jenis')->default('Replika Top Quality');
            $table->float('berat')->default(0.25);
            $table->string('gambar');
            $table->unsignedBigInteger('liga_id');
            $table->foreign('liga_id')->references('id')->on('ligas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
