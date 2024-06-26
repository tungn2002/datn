<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    use HasFactory;
    protected $table = 'prescription_medicines';

    protected $fillable = [
        'information',
'id_prescription', 'id_medicine',
    ];
    public $timestamps = false;
}
