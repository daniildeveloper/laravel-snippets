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
        $posts = Post::all();

        dd($posts);
    }
}
