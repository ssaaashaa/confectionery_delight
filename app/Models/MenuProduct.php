<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        "menuCategoryId",
        "name",
        "description",
        "price",
        "weight",
        "img"
    ];
}
