<?php
use GuzzleHttp\Client as Guzzle;
use App\Wordpress\MetaPost as Meta;
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
        // $post = new Post;
        // $post->post_title = "Corcel";
        // // $post->post_slug = "corcel";
        // $post->post_content = "Some content";
        // $post->post_type = "product";
        // // $post->author_id = 1;
        // $post->save();
        //
        // \Storage::put("some.jpg", );

        // http://i.huffpost.com/gen/1155836/images/o-AWESOME-GIFS-facebook.jpg
        // $this->parseSvet();
        // $this->testConnection();
        // $this->deleteProducts();
        $this->testGuzzleRes();
    }

    // public function parse
    // 

    public function testGuzzleRest() {
        $client = new Guzzle();
        $res = $client->request("GET", "http://localhost/nomad/wp-json/wp/v2/posts/1");
        dd($res);


    }

    public function deleteProducts() {
        DB::connection("wordpress")->table("posts")->where("post_type", "product")->delete();
    }

    public function parseSvet()
    {
        include "simplehtmldom/simple_html_dom.php";
        $base_url = "http://www.svet.optimum74.ru";
        $html     = file_get_html("http://www.svet.optimum74.ru/catalog/");
        $links    = [];

        foreach ($html->find("ul.products-list li a") as $link) {
            // add all links to catalog items to array
            $links[] = $link->href;
        }

        $items = [];

        foreach ($links as $link) {
            $link_html = file_get_html($base_url . $link);
            $imgSrc    = $link_html->find('.img-holder img')[0]->attr['src'];
            $cat_id    = 5;

            $post             = new Post();
            $post->post_title = $link_html->find("#content h1")[0]->plaintext;
            $post->post_type  = "product";
            $description      = $link_html->find(".item .info p")[0]->plaintext; //preview description
            $description .= $link_html->find(".table-holder")[0]->outertext; //outer text with table with props
            // $description .= $link_html->find("#add-info")[0]->outertext;//outertext with table with info
            // page description
            $post->post_content = $description;
            // $item->imagePath   = 'preview.png';
            $post->save();
            $lastId = DB::connection("wordpress")->getPdo()->lastInsertId();
            \Log::info("Created post id is $lastId");
            \Storage::put("2017/parsed/svet/$post->title.jpg", file_get_contents($base_url . $imgSrc)); 

            $image = new Meta();
            $image->meta_key = "_wp_attached_file";
            $image->meta_value = "2017/parsed/svet/$post->title.jpg";
            $image->post_id = $lastId;
            $image->save();
        }
    }

    public function testConnection() {
        try {
            DB::connection("wordpress_remote")->getPdo();
        } catch (\Exception $e) {
            die("No connection to database: $e");
        }
    }
}
