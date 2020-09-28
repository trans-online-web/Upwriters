<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $guarded= [];

    public function category()
    {
        return $this->hasOne('App\Category', 'category');
    }
}
