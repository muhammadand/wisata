<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket'; // Menentukan nama tabel yang sesuai

    protected $fillable = ['nama_tiket', 'harga', 'stok']; // Kolom yang dapat diisi secara massal

    // Relasi dengan model Order (satu tiket bisa memiliki banyak order)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
