<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;
    protected $table = 'patientrecords';
    public $timestamps = false;
    protected $primaryKey = 'id_pr';
    protected $fillable = [
        'prname',
        'birthday',
        'phonenumber',
        'gender',
        'address',
        'id_user',
    ];
}
