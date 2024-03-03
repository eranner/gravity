<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'flavor',
        'in_stock',
    ];
}
