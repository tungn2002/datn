<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalResult extends Model
{
    use HasFactory;
    protected $table = 'medicalresults';

    protected $fillable = [
        'status',
        'reason',
        'detail',
        'booking_date',
        'id_mr', // Patient record ID
        'id_sch', // Appointment ID (optional, one-to-one with appointment)
        'id_prescription', // Prescription ID (optional)
    ];
}
