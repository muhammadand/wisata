<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'kontak',
        'foto_sampul',
        'foto_galeri',
        'category_id',
    ];

    protected $casts = [
        'foto_galeri' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
