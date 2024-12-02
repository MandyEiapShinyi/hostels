<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_name',
        'address',
        'room_quantity',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function address()
    {
        return $this->hasMany(Student::class,"address_id");
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
