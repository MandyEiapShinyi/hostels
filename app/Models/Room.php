<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'details',
        'person_quantity',
        'furniture',
        'room_fee',
        'address_id',
        'image',
    ];

    protected $casts = [
        'furniture' => 'array',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'room_id');
    }
}
