<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id_message';
    public $timestamps = false;
    protected $fillable = [
        'content',
        'id_cons',
        'status',
        'sender_id', // Consult ID
    ];
}
