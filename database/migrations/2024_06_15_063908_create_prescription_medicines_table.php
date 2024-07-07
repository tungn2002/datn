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
        Schema::create('prescription_medicines', function (Blueprint $table) {
            $table->unsignedInteger('id_prescription');
            $table->unsignedInteger('id_medicine');
            $table->string('information');

            $table->primary(['id_prescription', 'id_medicine']); // Khóa chính ghép
            $table->foreign('id_prescription')->references('id_pre')->on('prescriptions')->onDelete('cascade');
            $table->foreign('id_medicine')->references('id_medicine')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_medicines');
    }
};
