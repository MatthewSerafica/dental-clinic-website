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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id('history_id');
            $table->unsignedInteger('student_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->foreign('student_id')->references('id_number')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id_number')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('allergies')->default('none');
            $table->string('diabetes')->default('none');
            $table->string('blood_dyscrasia')->default('none');
            $table->string('cns_disorder')->default('none');
            $table->string('cardiovascular_disease')->default('none');
            $table->string('tooth_related_surgery')->default('none');
            $table->string('other_conditions')->default('none');
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
