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
        Schema::create('students', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('id_number')->unique();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->enum('sex', ['male','female']);
            $table->string('address');
            $table->string('contact_number');
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->enum('year', ['1st Year', '2nd Year', '3rd Year', '4th Year', '5th Year'])->nullable();
            $table->unsignedInteger('age');
            $table->date('birth_date');
            $table->string('updated_by')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
