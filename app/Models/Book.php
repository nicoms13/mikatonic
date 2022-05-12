<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book";
    protected $primaryKey = 'isbn';

    protected $fillable = [
        'title',
        'cover',
        'wallpaper',
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
}
