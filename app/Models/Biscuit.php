<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biscuit extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "img",
        "ingredients",
        "calories"
    ];
}
