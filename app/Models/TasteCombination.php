<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasteCombination extends Model
{
    use HasFactory;

    protected $fillable = [
        "biscuit_id",
        "fill_id",
        "ratio",
        "img"
    ];
}
