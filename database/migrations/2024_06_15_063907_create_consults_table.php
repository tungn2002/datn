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
        Schema::create('consults', function (Blueprint $table) {
            $table->increments('id_cons');
            
            $table->unsignedInteger('user1_id'); // Khóa ngoại đến users
            $table->unsignedInteger('user2_id'); // Khóa ngoại đến users
            $table->string('name');
            $table->dateTime('date_payment');
            $table->dateTime('end');
            $table->double('price');
            $table->unsignedInteger('id_prescription')->nullable(); // Khóa ngoại đến prescription (cho phép null)

            $table->foreign('user1_id')->references('id_user')->on('users');
            $table->foreign('user2_id')->references('id_user')->on('users');
            $table->foreign('id_prescription')->references('id_pre')->on('prescriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consults');
    }
};
