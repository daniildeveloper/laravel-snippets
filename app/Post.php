<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Post base type for post in database
 * 
 * Post default metas:
 * featured_image
 * keywords
 */
class Post extends Model
{
    protected $table = "posts";

    protected $connection = "marknomad";

    public function postMetas()
    {
        return $this->hasMany("App\PostMeta");
    }
}
