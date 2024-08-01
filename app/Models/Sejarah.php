<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'lokasi',
        'foto',
        'sumber',
        'category_id',
    ];

    /**
     * Get the category that owns the Sejarah.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
