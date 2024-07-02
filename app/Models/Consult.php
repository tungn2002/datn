<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;
    protected $table = 'consults';
    protected $primaryKey = 'id_cons';
    public $timestamps = false;
    protected $fillable = [
      'user1_id',
      'user2_id',
        'id_prescription', // Prescription ID (optional)
    ];
}
