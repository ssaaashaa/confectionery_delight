<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
    ];

    public function designs()
    {
        return $this->hasMany(Design::class);
    }
}
