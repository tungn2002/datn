<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $primaryKey = 'id_appointment';
    public $timestamps = false;
    protected $fillable = [
        'day',
        'time',
        'finishtime',
        'id_clinic',
    ];
}
