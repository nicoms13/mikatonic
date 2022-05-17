<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = "book";
    protected $primaryKey = 'isbn';

    protected $fillable = [
        'title',
        'desc',
        'pages',
    ];

    public $timestamps = false;


    public function authors() {
        return $this->belongsToMany('App\Models\Author', 'book_author', 'isbn', 'idAut');
    }

    public function genres() {
        return $this->belongsToMany('App\Models\Genre', 'book_genre', 'isbn', 'idGen');
    }

    public function genresNames() {
        return $this->genres->pluck('name');
    } 

    public function user() {
        return $this->belongsToMany('App\Models\User', 'bookshelf', 'isbn', 'idUser');
    }
    
}
