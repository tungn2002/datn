<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;
    protected $table = 'consults';

    protected $fillable = [
        'name',
        'date_payment',
        'end',
        'price',
        'id_prescription', // Prescription ID (optional)
    ];
}
