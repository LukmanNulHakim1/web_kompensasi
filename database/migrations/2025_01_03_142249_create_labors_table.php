<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('labors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->integer('capacity');
            $table->string('photo')->nullable(); // Kolom untuk path foto, bisa null
            $table->text('description')->nullable(); // Tambahkan kolom deskripsi
            $table->text('facilities')->nullable(); // Tambahkan kolom fasilitas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('labors');
    }
};
