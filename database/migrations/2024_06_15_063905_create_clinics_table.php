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
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id_clinic'); 
            $table->string('clinicname');
            $table->unsignedInteger('id_hospital'); // Khóa ngoại đến hospital
            $table->unsignedInteger('id_service'); // Khóa ngoại đến service

            $table->foreign('id_hospital')->references('id_hospital')->on('hospitals');
            $table->foreign('id_service')->references('id_service')->on('services');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
