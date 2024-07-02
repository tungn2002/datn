<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitals';
    protected $primaryKey = 'id_hospital';
    public $timestamps = false;

    protected $fillable = [
        'hospitalname',
        'address',
    ];


}
