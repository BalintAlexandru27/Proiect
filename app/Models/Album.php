<?php

namespace App\Models;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Taggable;
    public function photos() {
        return $this->hasMany('App\Models\Photo');
    }
}
