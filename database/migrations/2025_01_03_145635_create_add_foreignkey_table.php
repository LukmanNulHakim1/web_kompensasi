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
        // Menambahkan foreign key pada tabel admin_labors
        Schema::table('admin_labors', function (Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('labor_id')->references('id')->on('labors')->onDelete('cascade');
        });

        // Menambahkan foreign key pada tabel jadwal_bokings
        Schema::table('jadwal_bokings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('labor_id')->references('id')->on('labors')->onDelete('cascade');
            $table->foreign('slot_waktu_id')->references('id')->on('slot_waktus')->onDelete('cascade');
        });

        // Menambahkan foreign key pada tabel laporans
        Schema::table('laporans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('labor_id')->references('id')->on('labors')->onDelete('cascade');
        });

        // Menambahkan foreign key pada tabel notifikasis
        Schema::table('notifikasis', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus foreign key pada tabel admin_labors
        Schema::table('admin_labors', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['labor_id']);
        });

        // Menghapus foreign key pada tabel jadwal_bokings
        Schema::table('jadwal_bokings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['labor_id']);
            $table->dropForeign(['slot_waktu_id']);
        });

        // Menghapus foreign key pada tabel laporans
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['labor_id']);
        });

        // Menghapus foreign key pada tabel notifikasis
        Schema::table('notifikasis', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};
