<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public $fillable = [
        'transaksi_id',
        'user_id',
        'jumlah_bayar',
        'metode_pembayaran',
        'foto',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id'); // don't forget to add your full namespace
    }
}
