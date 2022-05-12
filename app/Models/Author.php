<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = "author";
    protected $primaryKey = 'idAut';

    protected $fillable = [
        'firstName',
        'lastName',
        'desc',
        'logo',
        'wallpaper',
    ];

    public $timestamps = false;
}
