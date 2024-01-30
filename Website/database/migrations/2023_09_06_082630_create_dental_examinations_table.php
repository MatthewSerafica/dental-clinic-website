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
        Schema::create('dental_examinations', function (Blueprint $table) {
            $table->id('exam_id');
            $table->unsignedInteger('student_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->foreign('student_id')->references('id_number')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id_number')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dentist_id')->nullable()->constrained('dentists', 'dentist_id')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('debris_tooth_stain', ['none', 'trace', 'slight', 'moderate', 'heavy'])->nullable()->default(null);
            $table->enum('calcular_deposits', ['none', 'trace', 'slight', 'moderate', 'heavy'])->nullable()->default(null);
            $table->enum('gingivitis', ['none', 'trace', 'slight', 'moderate', 'heavy'])->nullable()->default(null);
            $table->boolean('periodontal_pocket')->nullable()->default(null);
            $table->boolean('orthodontic_treatment')->nullable()->default(null);
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_examinations');
    }
};
