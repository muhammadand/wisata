<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Tentukan tabel jika tidak menggunakan penamaan default
    protected $table = 'feedbacks';

    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'message',
    ];
}
