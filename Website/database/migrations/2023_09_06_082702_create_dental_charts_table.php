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
        Schema::create('dental_charts', function (Blueprint $table) {
            $table->id('chart_id');
            $table->unsignedInteger('student_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->foreign('student_id')->references('id_number')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id_number')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dentist_id')->nullable()->constrained('dentists', 'dentist_id')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('tooth_type', ['temporary', 'permanent'])->default('permanent');
            $table->unsignedInteger('tooth_number');
            $table->enum('buccal', ['green', 'red', 'blue']);
            $table->enum('lingual', ['green', 'red', 'blue']);
            $table->enum('mesial', ['green', 'red', 'blue']);
            $table->enum('distal', ['green', 'red', 'blue']);
            $table->enum('occlusal', ['green', 'red', 'blue']);
            $table->enum('condition_one', ['/', 'C', 'X', 'Rf', 'M', 'Un', 'Tf', 'Am', 'Co', 'Gf', 'Jc', 'S', 'Fb', 'Ab', 'Sc', 'P', 'CD'])->nullable();
            $table->enum('condition_two', ['/', 'C', 'X', 'Rf', 'M', 'Un', 'Tf', 'Am', 'Co', 'Gf', 'Jc', 'S', 'Fb', 'Ab', 'Sc', 'P', 'CD'])->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_charts');
    }
};
