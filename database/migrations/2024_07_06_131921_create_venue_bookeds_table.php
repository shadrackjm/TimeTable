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
        Schema::create('venue_bookeds', function (Blueprint $table) {
            $table->id();
            $table->integer('venue_id');
            $table->integer('user_id');
            $table->string('time_slot');
            $table->string('day_of_week');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_bookeds');
    }
};
