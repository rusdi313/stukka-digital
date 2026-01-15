<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');        // Pastikan ini 'date', BUKAN 'date_string'
            $table->string('location');
            $table->string('price');       // Pastikan ini 'price', BUKAN 'price_string'
            $table->string('image');       // Pastikan ini 'image', BUKAN 'image_url'
            $table->string('status');      // 'upcoming', 'ongoing', 'closed'
            $table->timestamps();
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};