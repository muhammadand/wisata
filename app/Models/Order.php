<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['tiket_id', 'quantity', 'total_harga']; // Kolom yang dapat diisi secara massal

    // Relasi dengan model Tiket (satu order dimiliki oleh satu tiket)
    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
