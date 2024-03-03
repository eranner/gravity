<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shake extends Model
{
    use HasFactory;
    protected $fillable = [
        'shake',
        'in_stock',
    ];
}
