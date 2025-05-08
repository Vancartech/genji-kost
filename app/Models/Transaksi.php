<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'kamar_id',
        'harga',
        'status',
        'mulai',
        'batas',
    ];

    public function kamar() {
        return $this->belongsTo(Kamar::class); // don't forget to add your full namespace
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id'); // don't forget to add your full namespace
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'transaksi_id', 'id');
    }
}
