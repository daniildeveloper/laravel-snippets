<?php

namespace App\Wordpress;

use Corcel\Post as Corcel;

class Post extends Corcel
{
    protected $connection = "wordpress";

    protected $postType = "product";
}
