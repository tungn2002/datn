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
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id_service'); 
            $table->string('servicename');
            $table->text('detail');
            $table->double('price');
            $table->unsignedInteger('id_specialist'); // Khóa ngoại đến specialist
            $table->string('image');

            $table->foreign('id_specialist')->references('id_specialist')->on('specialists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
