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
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id_message');
            $table->unsignedInteger('id_cons'); // Khóa ngoại đến consult
            $table->unsignedInteger('sender_id');
            $table->text('status');
            $table->text('content');
            $table->foreign('id_cons')->references('id_cons')->on('consults')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
