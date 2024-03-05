<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobileorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'price',
        'complete'
    ];
}
