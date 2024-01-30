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
        Schema::create('treatment_records', function (Blueprint $table) {
            $table->id('record_id');
            $table->unsignedInteger('student_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->foreign('student_id')->references('id_number')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id_number')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dentist_id')->nullable()->constrained('dentists', 'dentist_id')->onUpdate('cascade')->onDelete('cascade');
            $table->time('time_in');
            $table->time('time_out');
            $table->date('date');
            $table->string('service_rendered');
            $table->string('clinical_findings');
            $table->string('diagnosis');
            $table->string('prescription');
            $table->string('remarks');
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_records');
    }
};
