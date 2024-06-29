<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescriptions';
    public $timestamps = false;
    protected $primaryKey = 'id_pre';

    protected $fillable = [
        'name',
        'diagnostic',
        'day',
    ];
}
