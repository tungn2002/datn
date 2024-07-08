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
        Schema::create('patientrecords', function (Blueprint $table) {
            $table->increments('id_pr'); 
            $table->string('prname');
            $table->date('birthday');
            $table->string('phonenumber')->unique();
            $table->string('gender');
            $table->string('address');
            $table->unsignedInteger('id_user'); 

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patientrecords');
    }
};
