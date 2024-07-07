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
        Schema::create('consults', function (Blueprint $table) {
            $table->increments('id_cons');
            
            $table->unsignedInteger('user1_id'); // Khóa ngoại đến users
            $table->unsignedInteger('user2_id'); // Khóa ngoại đến users
            $table->unsignedInteger('id_prescription')->nullable(); // Khóa ngoại đến prescription (cho phép null)

            $table->foreign('user1_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('user2_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_prescription')->references('id_pre')->on('prescriptions')->onDelete('cascade');
        });
        DB::unprepared('
        CREATE TRIGGER delete_prescription_after_consult_delete
        AFTER DELETE ON consults
        FOR EACH ROW
        BEGIN
            DELETE FROM prescriptions WHERE id_pre = OLD.id_prescription;
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS delete_prescription_after_consult_delete');

        Schema::dropIfExists('consults');
    }
};
