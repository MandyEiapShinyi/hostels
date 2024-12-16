<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'room_id',
        'email',
        'date',
        'address_id',
        'image',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function Servise()
    {
        return $this->hasMany(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentReceipt()
    {
        return $this->hasMany(PaymentReceipt::class, 'user_id');
    }
    

}
