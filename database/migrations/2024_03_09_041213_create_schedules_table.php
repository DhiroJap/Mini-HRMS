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
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->uuid('user_id');
            $table->enum('day', ['Monday', 'Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']);
            $table->dateTime('start_time', $precision = 0);
            $table->dateTime('end_time', $precision = 0);

            // $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
