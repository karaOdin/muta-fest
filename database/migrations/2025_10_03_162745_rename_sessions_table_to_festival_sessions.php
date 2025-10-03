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
        Schema::rename('sessions', 'festival_sessions');
        
        // Update the pivot table foreign key reference
        Schema::table('guest_session', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
            $table->foreign('session_id')->references('id')->on('festival_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_session', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });
        
        Schema::rename('festival_sessions', 'sessions');
    }
};