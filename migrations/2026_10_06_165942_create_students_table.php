<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code', 20)->unique();
            $table->string('prefix_th', 20);
            $table->string('first_name_th', 100);
            $table->string('last_name_th', 100);
            $table->string('prefix_en', 20);
            $table->string('first_name_en', 100);
            $table->string('last_name_en', 100);
            $table->string('national_id', 13)->unique();
            $table->date('birth_date');
            $table->string('gender', 10);
            $table->string('religion', 50)->nullable();
            $table->string('nationality', 50)->default('ไทย');
            $table->string('blood_group', 5)->nullable();
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->text('address');
            $table->string('subdistrict', 100);
            $table->string('district', 100);
            $table->string('province', 100);
            $table->string('postal_code', 10);
            $table->string('father_name', 150)->nullable();
            $table->string('father_phone', 20)->nullable();
            $table->string('mother_name', 150)->nullable();
            $table->string('mother_phone', 20)->nullable();
            $table->string('emergency_contact', 150)->nullable();
            $table->string('emergency_phone', 20)->nullable();
            $table->string('faculty', 150);
            $table->string('major', 150);
            $table->integer('study_year');
            $table->decimal('gpa', 3, 2)->default(0.00);
            $table->string('status', 50)->default('กำลังศึกษา');
            $table->string('advisor_name', 150)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};