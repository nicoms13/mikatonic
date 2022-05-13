<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Author extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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
