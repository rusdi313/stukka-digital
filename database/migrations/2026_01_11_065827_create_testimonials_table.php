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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Orang
            $table->string('role')->nullable(); // Jabatan (CEO, Manager, dll)
            $table->text('content'); // Isi Testimoni
            $table->integer('stars')->default(5); // Jumlah Bintang (1-5)
            $table->string('photo')->nullable(); // Foto Orang (Opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
