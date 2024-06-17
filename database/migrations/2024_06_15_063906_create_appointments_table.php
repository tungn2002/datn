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
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id_appointment');
            $table->date('day');
            $table->time('time');
            $table->unsignedInteger('id_user'); // Khóa ngoại đến users (bác sĩ)
            $table->unsignedInteger('id_clinic'); // Khóa ngoại đến clinic

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_clinic')->references('id_clinic')->on('clinics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
