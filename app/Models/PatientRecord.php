<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;
    protected $table = 'patientrecords';

    protected $fillable = [
        'prname',
        'birthday',
        'phonenumber',
        'gender',
        'address',
        'id_user',
    ];
}
