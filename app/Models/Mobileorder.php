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
        'complete',
        'customer_name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->complete = $model->complete ?? 0;
        });
    }
}
