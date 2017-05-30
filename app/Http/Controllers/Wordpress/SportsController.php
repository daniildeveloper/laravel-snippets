<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use php_rutils\Rutils;

class SportsController extends Controller
{
    protected $client;

    public function __construct()
    {
        $base64       = base64_encode("username:password");
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://www.daniiltserin.smartsol.kz/wordpress/wp-json/wp/v2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'headers'  => ['Content-Type' => 'application/json', "Accept" => "application/json", 'Authorization' => "Basic " . $base64],
            //ssl false
            'verify'   => false,
        ]);
    }

    /**
     * import all post from database DLE
     * @return [type] [description]
     */
    public function importPosts()
    {
        $dle_posts = DB::connection("almatysports")->table("dle_post")->get();

        foreach ($dle_post as $post) {
            $params = array(
                "title"          => $post->title,
                "content_raw"    => $post->full_story,
                "date"           => $post->date,
                "slug"           => Rutils::translit()->slugify($post->title),
                "status"         => "publish",
                "author"         => 1,
                // "featured_media" => 1 todo: import media
                "comment_status" => "closed",

            );
            $response = $client->post('posts/',
                ['body' => json_encode($params)]
            );
        }

    }
    public function saveRequest(Request $request)
    {}

}
