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
        'address_id',
    ];

    protected $casts = [
        'furniture' => 'array',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'room_id');
    }
}
