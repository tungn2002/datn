<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinic';

    protected $fillable = [
        'clinicname',
        'id_h',
        'id_ms', // Foreign key for service
    ];

}
