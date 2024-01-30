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
        Schema::create('times', function (Blueprint $table) {
            $table->id('times_id');
            $table->foreignId('availability_id')->references('availability_id')->on('dentist_availabilities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('days');
            $table->time('time');
            $table->boolean('isBooked')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
