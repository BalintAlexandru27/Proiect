<?php

namespace App\Models;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use Taggable;

    public function Album() {
        return $this->belongsTo('App\Models\Album');
    }
}
