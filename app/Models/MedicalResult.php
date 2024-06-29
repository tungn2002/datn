<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalResult extends Model
{
    use HasFactory;
    protected $table = 'medicalresults';

    protected $primaryKey = 'id_result';
    public $timestamps = false;
    protected $fillable = [
        'status',//bao gồm chờ duyệt, chưa thanh toán, đã thanh toán trong phan validate
        'reason',
        'detail',
        'booking_date',
        'image',
        'id_mr', // Patient record ID
        'id_sch', // Appointment ID (optional, one-to-one with appointment)
        'id_prescription', // Prescription ID (optional) nullable
    ];
}
