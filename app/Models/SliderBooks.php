<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderBooks extends Model
{
    use HasFactory;

    protected $table = "slider_books";

    protected $fillable = [
        'isbn',
    ];

    public $timestamps = false;
}
