<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
    protected $table = 'specialists';
    protected $primaryKey = 'id_specialist';
    protected $fillable = [
        'spname',
    ];
    public $timestamps = false;

}
