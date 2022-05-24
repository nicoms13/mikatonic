<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = "genre";
    protected $primaryKey = 'idGen';

    protected $fillable = [
        'name',
        'desc',
    ];

    public $timestamps = false;

    public function books() {
        return $this->belongsToMany('App\Models\Book', 'book_genre', 'idGen', 'isbn');
    }
}
