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
        Schema::create('guest_session', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->constrained()->onDelete('cascade');
            $table->foreignId('session_id')->constrained('festival_sessions')->onDelete('cascade');
            $table->string('role_in_session')->nullable()->comment('Speaker, Moderator, Performer, etc.');
            $table->timestamps();
            
            $table->index(['guest_id', 'session_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_session');
    }
};