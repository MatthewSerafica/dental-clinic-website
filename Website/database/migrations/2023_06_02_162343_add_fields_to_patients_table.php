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
        Schema::table('patients', function (Blueprint $table) {
            $table->char('pat_type');
            $table->string('last_name');
            $table->string('first_name');
            $table->date('birth_date');
            $table->string('address');
            $table->char('sex');
            $table->string('civil_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('patients', [
            'pat_type', 'last_name', 'first_name', 'birth_date', 'address', 'sex', 'civil_status',
        ]);
    }
};
