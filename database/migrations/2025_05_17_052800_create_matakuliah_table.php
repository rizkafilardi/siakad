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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->bigIncrements('id_mata_kuliah');
            $table->string('kode')->unique();
            $table->string('nama')->unique();
            $table->integer('sks');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->foreignId('dosen_pengampu_1_id')->nullable()->references('id_dosen')->on('dosen')->nullOnDelete();
            $table->foreignId('dosen_pengampu_2_id')->nullable()->references('id_dosen')->on('dosen')->nullOnDelete();
            $table->foreignId('dosen_pengampu_3_id')->nullable()->references('id_dosen')->on('dosen')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
