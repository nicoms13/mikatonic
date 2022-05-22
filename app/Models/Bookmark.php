<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = "bookmark";

    public $timestamps = false;

    public function books() {
        return $this->belongsToMany('App\Models\Book', 'isbn');
    }
}
