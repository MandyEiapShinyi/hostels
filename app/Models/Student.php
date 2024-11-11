<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'phone_number',
        'room_id',
        'email',
        'address_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
