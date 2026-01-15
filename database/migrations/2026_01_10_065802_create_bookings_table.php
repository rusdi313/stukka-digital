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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke User
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Data Diri
            $table->string('name');
            $table->string('whatsapp_number'); // <--- INI YANG TADI ERROR (KURANG)
            $table->string('email');
            
            // Detail Event
            $table->string('event_type');      // Dulu 'service_type'
            $table->date('event_date');        // Dulu 'booking_date'
            $table->string('guest_estimate');  // Kolom Baru
            $table->string('budget_estimate'); // Kolom Baru
            $table->text('notes')->nullable();
            
            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
