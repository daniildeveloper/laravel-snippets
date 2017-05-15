<?php

use App\Wordpress\Post;
use Illuminate\Database\Seeder;

class NomadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->post_title = "Corcel";
        // $post->post_slug = "corcel";
        $post->post_content = "Some content";
        $post->post_type = "product";
        // $post->author_id = 1;
        $post->save();
    }
}
