<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    // Category.php
public function wisata()
{
    return $this->hasMany(Wisata::class);
}

public function sejarah()
{
    return $this->hasMany(Sejarah::class);
}

public function seniBudaya()
{
    return $this->hasMany(SeniBudaya::class);
}
public function product()
{
    return $this->hasMany(Product::class);
}


}

