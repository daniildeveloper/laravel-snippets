<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostMeta;

use php_rutils\Rutils;

use Illuminate\Http\Request;

class NomadLaravelController extends Controller
{
    public function index() {
      $this->parseSvetApi();
    }

    /**
     * parse optimum svet and paste data to wordpress
     * @return [type] [description]
     */
    public function parseSvetApi()
    {
        set_time_limit(0);
        include_once "simplehtmldom/simple_html_dom.php";
        $base_url = "http://www.svet.optimum74.ru";
        $html     = file_get_html("http://www.svet.optimum74.ru/catalog/");
        $links    = [];

        $svetcategory = new PostMeta();
        $svetcategory->post_id = 0;
        $svetcategory->key = "Категория товаров";
        $svetcategory->value = "Светодиоодное освещение";
        $svetcategory->save();

        foreach ($html->find("ul.products-list li a") as $link) {
            // add all links to catalog items to array
            $links[] = $link->href;
            \Log::info("Just another parse ink for svet is $link");
        }

        $items = [];

        foreach ($links as $link) {
            // create base link to parse
            $link_html = file_get_html($base_url . $link);

            //items title
            $itemTitle = $link_html->find("#content h1")[0]->plaintext; //find items title
            \Log::info('Product to add: ' . $itemTitle);

            $imgSrc    = $link_html->find('.img-holder img')[0]->attr['src'];
            $imageName =  Rutils::translit()->slugify($itemTitle) . '.png';
            $slugified = Rutils::translit()->slugify($itemTitle);
            $img = \Storage::put($imageName, file_get_contents($base_url . $imgSrc));
            // 
            $post = new Post();
            $post->title = $itemTitle;
            $post->slug = $slugified;
            $post->link = $slugified;
            $post->featured_media = "images/" . $img; 
            $post->content = $link_html->find(".item .info")[0]->outertext;
            $post->save();

            $category = new PostMeta();
            $category->post_id = 0;
            $category->key = "category";
            $category->value = $svetcategory->id;
            $category->save();
        }

    }


    private function getHrefs($arr = [])
    {
        $links = [];
        foreach ($arr as $i) {
            $links[] = $i->href;
        }
        return $links;
    }
}
