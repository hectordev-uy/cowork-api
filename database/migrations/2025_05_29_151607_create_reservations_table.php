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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('space_id');
            $table->unsignedBigInteger('user_id');
            $table->string('start_date');
            $table->string('end_date'); 
            $table->enum('status', ['available', 'booked', 'canceled']);
            $table->float('total_price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('space_id')->references('id')->on('spaces');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
