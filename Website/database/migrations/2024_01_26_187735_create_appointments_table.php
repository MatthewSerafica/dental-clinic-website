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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('app_id');
            $table->foreignId('user_id')->constrained('users', 'id')->onUpdate('cascade');
            $table->foreignId('dentist_id')->constrained('dentists', 'dentist_id')->onUpdate('cascade')->onDelete('cascade');
            $table->date('app_date');
            $table->time('app_time');
            $table->string('app_type');
            $table->string('pat_notes')->nullable();
            $table->string('school')->nullable();
            $table->string('status');
            $table->boolean('notification_sent')->default(false);
            $table->timestamp('archived_at')->nullable();
            $table->foreignId('times_id')->nullable()->references('times_id')->on('times');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
