<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    protected $primaryKey = 'id_clinic';
    public $timestamps = false;

    protected $fillable = [
        'clinicname',
        'id_hospital',
        'id_user',
        'id_service', // Foreign key for service
    ];

}
