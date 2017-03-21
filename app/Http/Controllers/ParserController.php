<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Storage;

class ParserController extends Controller
{
    /**
     * Сайт по оборудованию http://tssp.kz не хочет парсить все.
     *
     */
    public function parse()
    {
        include "simplehtmldom/simple_html_dom.php";
        

        dd($items);
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

            $item              = new Product();
            $item->title       = $link_html->find("#content h1")[0]->plaintext;
            $item->category_id = $cat_id;
            $item->description = $link_html->find(".item .info p")[0]->plaintext;
            $item->imagePath   = 'preview.png';
            $item->save();
            $items[] = $item;
            Storage::put('cat-5/' . $item->id . '/preview.png', file_get_contents($base_url . $imgSrc));
        }

    }

}
