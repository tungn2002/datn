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
            $table->time('finishtime');

            $table->unsignedInteger('id_clinic'); // Khóa ngoại đến clinic

            $table->foreign('id_clinic')->references('id_clinic')->on('clinics')->onDelete('cascade');
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
