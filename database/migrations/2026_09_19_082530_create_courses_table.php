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
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('code'); // Contoh: SIP101
        $table->string('name'); // Nama Mata Kuliah
        $table->integer('sks'); // Bobot SKS
        $table->integer('semester'); // Angka semester (1-8)
        $table->text('description'); // Deskripsi singkat/silabus
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
