<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * all other data for post
 */
class PostMeta extends Model
{
    protected $table = "post_metas";

    protected $connection = "marknomad";

    /**
     * get post for this meta
     * @return App\Post
     */
    public function post()
    {
        return $this->belongsTo("App\Post", "id");
    }
}
