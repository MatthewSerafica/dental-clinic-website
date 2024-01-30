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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigInteger('id')->unique()->autoIncrement();
            $table->string('id_number')->unique();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('employee_type', ['teaching', 'non-teaching']);
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->string('address');
            $table->string('contact_number');
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('department');
            $table->unsignedInteger('age');
            $table->date('birth_date');
            $table->string('updated_by')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->primary(array('id_number'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
