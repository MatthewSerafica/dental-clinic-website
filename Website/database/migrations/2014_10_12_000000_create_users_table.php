<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('user_type', ['dentist', 'student', 'employee', 'assistant', 'admin']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('made_appointment')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('archived_at')->nullable();
            $table->time('time_in')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER prevent_admin_deletion
            BEFORE DELETE ON users
            FOR EACH ROW
            BEGIN
                IF OLD.user_type = "admin" THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Cannot delete admin account";
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
