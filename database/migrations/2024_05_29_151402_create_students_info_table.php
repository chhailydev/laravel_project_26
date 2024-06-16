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
            $table->id();
            $table->string('kh_name');
            $table->string('latin_name');
            $table->string('gender');
            $table->date('DOB');
            $table->text('phone_number');
            $table->string('email');
            $table->string('programs');
            $table->integer('major_id');
            $table->string('degrees');
            $table->string('shift');
            $table->integer('id_passport');
            $table->integer('nationality');
            $table->string('country');
            $table->binary('picture');
            $table->json('education_info');
            $table->json('family_info');
            $table->json('address_info');
            $table->text('gurardian_phone_number');
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
