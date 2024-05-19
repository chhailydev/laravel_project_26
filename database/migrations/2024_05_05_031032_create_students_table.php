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
            $table->id("id")->autoIncrement();
            $table->binary('profile');
            $table->string("card_id");
            $table->string("firstname");
            $table->string("middle_name");
            $table->string("lastname");
            $table->string("email");
            $table->date("dob");
            $table->string("gender");
            $table->string("phone");
            $table->string("address");
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
