<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicalresults', function (Blueprint $table) {
            $table->increments('id_result');
            $table->string('status');
            $table->string('reason');
            $table->text('detail');
            $table->string('image')->nullable(); 
            $table->date('booking_date');
            $table->unsignedInteger('id_mr'); // Khóa ngoại đến patientrecords
            $table->unsignedInteger('id_sch'); // Khóa ngoại đến appointment
            $table->unsignedInteger('id_prescription')->nullable(); // Khóa ngoại đến prescription (cho phép null)

            $table->foreign('id_mr')->references('id_pr')->on('patientrecords')->onDelete('cascade');
            $table->foreign('id_sch')->references('id_appointment')->on('appointments')->onDelete('cascade');
            $table->foreign('id_prescription')->references('id_pre')->on('prescriptions')->onDelete('cascade');
        });

        DB::unprepared('
    CREATE TRIGGER delete_prescription_after_medicalresult_delete
    AFTER DELETE ON medicalresults
    FOR EACH ROW
    BEGIN
        DELETE FROM prescriptions WHERE id_pre = OLD.id_prescription;
    END
');
    }// Tạo trigger
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS delete_prescription_after_medicalresult_delete');

        Schema::dropIfExists('medicalresults');
    }
};
