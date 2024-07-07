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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user'); // Khóa chính
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('avatar')->nullable(); // Cho phép giá trị null
            $table->unsignedInteger('id_role'); // Khóa ngoại (integer unsigned)
            $table->string('signature')->nullable();
            $table->double('price')->nullable();
            $table->text('working_hours')->nullable();

            $table->unsignedInteger('id_specialist')->nullable();
            $table->string('token')->nullable();

            // Định nghĩa khóa ngoại
            $table->foreign('id_specialist')->references('id_specialist')->on('specialists')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
