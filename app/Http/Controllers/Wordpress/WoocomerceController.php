<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use Automattic\WooCommerce\Client;
use FtpClient\FtpClient;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;
use php_rutils\Rutils;

// use WooCommerce;

/**
* Controller to iteract with wordpress woocomerce
*/
class WoocomerceController extends Controller
{
    protected $nomadUri = "http://localhost/nomad/wp-json/wp/v2/";
    protected $woocommerce;
    
    protected $nomad;
    
    protected $base64;
    
    protected $restApiClient;
    
    protected $remoteDaniiltserin;
    
    
    protected $remoteTestClient;
    
    public $localShop = "http://localhost/nomad";
    
    public $remoteShop = "http://nomadsynergy.kz";
    
    public $remoteTest = "https://as.daniiltserin.ru";
    
    public function __construct()
    {
        $this->base64      = base64_encode("super:super");
        $this->woocommerce = new Client("http://localhost/nomad",
        "ck_5c17b31649c496ad475980cdee2e0b6c0f223330",
        "cs_36c1dc83b4aa012e67dc53cd460bec3e87118bb3"
        );
        
        $this->nomad = new Client("http://nomadsynergy.kz",
        "ck_63ab9cbb9f39036142a8fd3123db1b5b45317a34",
        "cs_c66bf6869c67bacad335427cc1946ea623641a72"
        );
        
        $this->restApiClient = new Guzzle([
        "base_uri" => $this->nomadUri,
        "timeout"  => 40.0,
        'headers'  => ['Content-Type' => 'application/json', "Accept" => "application/json", 'Authorization' => "Basic " . $this->base64],
        // "auth"     => [
        //     "admin",
        //     "admin",
        // ],
        ]);
        $this->remoteDaniiltserin = new Client($this->remoteTest, env("DANIILTSERIN_WOOCOMERCE_PK"), env("DANIITLSERIN_WOOCOMERCE_PK"));
    }
    
    public function test()
    {
        // $this->testFtp();
        // $this->parseSvetApi();
        // $this->clearProducts();
        // $this->parseTsspApi();
        $this->parseAmirsanApi();
    }
    
    public function parseAmirsanApi()
    {
        ini_set('allow_url_fopen', '1');
        $shop = $this->remoteTest;
        include_once "simplehtmldom/simple_html_dom.php";
        $base_url_single = "http://amirsana.kz";
        $html            = file_get_html($base_url_single);
        //берем все менюшки
        $menu = $html->find(".desktop-catalog-menu .menu-item a");
        //transform array by deleting unnecesary menu items
        $transformedMenu = [];
        for ($i = 1; $i < 4; $i++) {
            $transformedMenu[] = $menu[$i];
        }
        $menu = $transformedMenu;
        
        $secondChildHrefs = [];
        foreach ($menu as $menuItem) {
            // get first child category name
            // $catName = $menuItem->find("span.caption")[0]->innertext;
            // uncomment for production parsing
            // save first child category
            // $sizFirstChildCategory            = new Categories();
            // $sizFirstChildCategory->name      = $catName;
            // $sizFirstChildCategory->parent_id = $this->sizCategoryId;
            // $sizFirstChildCategory->save();
            //category id
            $sizFirstChildCategoryId = isset($sizFirstChildCategory) ? $sizFirstChildCategory->id : 1;
            
            // link to shop preview of category
            $sizFirstChildCategoryLinkToShop = $menuItem->href;
            
            $sizFirstChildCategoryShopIndex = file_get_html($base_url_single . $sizFirstChildCategoryLinkToShop);
            $secondChildCategoriesList      = $sizFirstChildCategoryShopIndex->find("ul.catalog-menu li.expanded ul.children-items li a");
            
            // parse second-child categories
            foreach ($secondChildCategoriesList as $sccl) {
                $secondChildHrefs[] = $sccl->href;
            }
        }
        $productItemsHrefs = [];
        // parser all catalog items
        foreach ($secondChildHrefs as $p) {
            $toParse           = $secondChildHrefs[0];
            $catalogItems      = file_get_html($base_url_single . $toParse);
            $catalogItemsHrefs = $catalogItems->find(".catalog-container .product_list .product-link .product-image a");
            foreach ($catalogItemsHrefs as $key) {
                $productItemsHrefs[] = $key->href;
            }
        }
        // dd($productItemsHrefs);
        unset($secondChildHrefs);
        unset($transformedMenu);
        foreach ($productItemsHrefs as $productHref) {
            
            //parse each items
            // dd($productHref);
            \Log::info('product' . $productHref);
            $product = file_get_html($base_url_single . $productHref);
            
            
            if(strlen($product->find(".content")[0]->plaintext) < 40) {
                dd("404");
            } else {
                
                $imgSrc    = $product->find('.img-holder img')[0]->attr['src'];
                $imageName = '2017/05/' . Rutils::translit()->slugify($itemTitle) . '.png';
                $slugified = Rutils::translit()->slugify($itemTitle);
                $title = $product->find("h1")[0]->plaintext;
                $slug = Rutils::translit()->slugify($title);
                $imgSrc = $product->find("bx_bigimages_aligner_outer img")->attr("src");
                $imageName = "2017/05".$slug.".jpg";
                \Storage::put($imageName, file_get_contents($base_url_single. $imgSrc));
                
                $ftp = new FtpClient();
                $ftp->connect(env("SMARTSOL_FTP_HOST"));
                $ftp->login(env("SMARTSOL_FTP_USER"), env("SMARTSOL_FTP_PASS"));
                // dd(base_path());
                $ftp->putAll(base_path() . "\public\wordpress\wp-content\wp-upload\\2017\\05\\emost", "/var/www/as/wp-content/uploads/2017/05", FTP_BINARY);
                
                $infoArray        = $product->find(".item_info_section");
                $info             = "";
                foreach ($infoArray as $i) {
                    $info .= $i;
                }
                
                $data["product"] = [
                "title"              => $title,
                "type"               => "simple",
                "status"             => "publish",
                "downloadable"       => false,
                "virtual"            => false,
                "permalink"          => $shop . "/shop/" . $slug,
                "sku"                => "",
                "price"              => "",
                "regular_price"      => "",
                "sale_price"         => null,
                "price_html"         => "",
                "taxable"            => true,
                "tax_status"         => "taxable",
                "tax_class"          => "",
                "managing_stock"     => false,
                "stock_quantity"     => null,
                "in_stock"           => true,
                "backorders_allowed" => false,
                "backordered"        => false,
                "sold_individually"  => false,
                "purchaseable"       => false,
                "featured"           => false,
                "visible"            => true,
                "catalog_visibility" => "visible",
                "on_sale"            => false,
                "product_url"        => "",
                "button_text"        => "",
                "weight"             => null,
                "shipping_required"  => true,
                "shipping_taxable"   => true,
                "shipping_class"     => "",
                "shipping_class_id"  => null,
                "description"        => $info,
                "short_description"  => "",
                "reviews_allowed"    => true,
                "average_rating"     => "0.00",
                "rating_count"       => 0,
                "related_ids"        => [],
                "upsell_ids"         => [],
                "cross_sell_ids"     => [],
                "parent_id"          => 0,
                "categories"         => [],
                "tags"               => [],
                "attributes"         => [],
                "downloads"          => [],
                "download_limit"     => -1,
                "download_expiry"    => -1,
                "download_type"      => "standard",
                "purchase_note"      => "",
                "total_sales"        => 0,
                "variations"         => [],
                "parent"             => [],
                "grouped_products"   => [],
                "menu_order"         => 0,
                "images"             => [[
                // "id"         => 14,
                // "created_at" => "2017-05-11T08:27:02Z",
                // "updated_at" => "2017-05-11T08:27:02Z",
                "src"      => $shop . "/wp-content/uploads/2017/05/" . $slug . ".jpg",
                "title"    => $slug,
                "alt"      => $title,
                "position" => 0,
                ]],
                ];
                $this->remoteDaniiltserin->post("products", $data);
                
            }
            
            
            // $productContainer = $product->find(".content-wrapper .content");
            // $infoArray        = $product->find(".item_info_section");
            // $info             = "";
            // foreach ($infoArray as $i) {
            //     $info .= $i;
            // }
            // //save product to database
            // $productModel              = new Product();
            // $productModel->title       = $product->find("h1")[0]->plaintext;
            // $productModel->description = $info;
            // $productModel->category_id = 1;
            // $productModel->imagePath   = "preview.png";
            // $productModel->save();
            // Storage::put('cat-1/' . $productModel->id . '/preview.png', file_get_contents($base_url_single . $product->find('.bx_bigimages_aligner_outer img')[0]->attr['src']));
        }
    }
    
    /**
    * parsing tssp doesnt work correctly
    * @return [type] [description]
    */
    public function parseTsspApi()
    {
        include_once "simplehtmldom/simple_html_dom.php";
        $base_url        = "http://tssp.kz/";
        $base_url_single = "http://tssp.kz";
        $ci              = curl_init($base_url_single);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_HEADER, true);
        $header[] = "Connection: keep-alive";
        $header[] = "Pragma: no-cache";
        $header[] = "Cache-Control: no-cache";
        $header[] = "Upgrade-Insecure-Requests: 1";
        $header[] = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:51.0) Gecko/20100101 Firefox/51.0";
        $header[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
        $header[] = "Accept-Encoding: gzip, deflate";
        $header[] = "Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";
        // $header[] = "Cookie: PHPSESSID=6gr04a7dmpdft1ekojd3e7v9u2; referrer=typein; entry_page=http%3A%2F%2Fwww.yell.ru%2Fmoscow%2Fcom%2Fmosvet-mosvet-veterinarnaya-klinika_2028012%2F; edition=moscow; browserId=8zmBJaAVzRveB6dfAX8pry7uXVuHbP; _ym_uid=1477249415409822960; _ym_isad=2; _ga=GA1.2.1396808801.1477249416; _dc_gtm_UA-3064419-7=1";
        // curl_setopt($ci, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        curl_setopt($ci, CURLOPT_FOLLOWLOCATION, true);
        $c    = curl_exec($ci);
        $html = str_get_html($c);
        dd($c);
        // unset($ci);
        //get all neeed menu links
        $links    = $html->find('ul.navbar-nav li.drop-menu-link', 0)->find('.row .col-md-4 ul li a');
        $main_arr = [];
        dd($main_arr);
    }
    
    /**
    * this function parse and store all items from npommz to nomadsynergy.kz database
    * @return happy Mark
    */
    public function parseEmostApi()
    {
        // create ctaegory
        $eCat                    = "Емкостное оборудование";
        $cat["product_category"] = [
        "name"   => $eCat,
        "slug"   => Rutils::translit()->slugify($eCat),
        "parent" => 0,
        ];
        // $this->nomad->post("products/categories", $cat);
        // end category create
        
        // parse all links
        include_once "simplehtmldom/simple_html_dom.php";
        $baseUrl = "http://www.npommz.ru/emkostnoe-oborudovanie";
        $html    = file_get_html($baseUrl);
        $aDOM    = $html->find(".wp-caption a");
        $links   = $this->getHrefs($aDOM);
        
        $ftp = new FtpClient();
        $ftp->connect(env("SMARTSOL_FTP_HOST"));
        $ftp->login(env("SMARTSOL_FTP_USER"), env("SMARTSOL_FTP_PASS"));
        // dd(base_path());
        $ftp->putAll(base_path() . "\public\wordpress\wp-content\wp-upload\\2017\\05\\emost", "nomadsynergy.kz/wp-content/uploads/2017/05", FTP_BINARY);
        
        foreach ($links as $link) {
            $htm   = file_get_html("http:" . $link);
            $data  = [];
            $title = $htm->find(".title")[0]->plaintext;
            $slug  = Rutils::translit()->slugify($title);
            
            $data["product"] = [
            "title"              => $htm->find(".title")[0]->plaintext,
            "type"               => "simple",
            "status"             => "publish",
            "downloadable"       => false,
            "virtual"            => false,
            "permalink"          => $this->remoteShop . "/shop/" . $slug,
            "sku"                => "",
            "price"              => "",
            "regular_price"      => "",
            "sale_price"         => null,
            "price_html"         => "",
            "taxable"            => true,
            "tax_status"         => "taxable",
            "tax_class"          => "",
            "managing_stock"     => false,
            "stock_quantity"     => null,
            "in_stock"           => true,
            "backorders_allowed" => false,
            "backordered"        => false,
            "sold_individually"  => false,
            "purchaseable"       => false,
            "featured"           => false,
            "visible"            => true,
            "catalog_visibility" => "visible",
            "on_sale"            => false,
            "product_url"        => "",
            "button_text"        => "",
            "weight"             => null,
            "shipping_required"  => true,
            "shipping_taxable"   => true,
            "shipping_class"     => "",
            "shipping_class_id"  => null,
            "description"        => $htm->find(".content")[0]->innertext,
            "short_description"  => "",
            "reviews_allowed"    => true,
            "average_rating"     => "0.00",
            "rating_count"       => 0,
            "related_ids"        => [],
            "upsell_ids"         => [],
            "cross_sell_ids"     => [],
            "parent_id"          => 0,
            "categories"         => $cat["product_category"]["slug"],
            "tags"               => [],
            "attributes"         => [],
            "downloads"          => [],
            "download_limit"     => -1,
            "download_expiry"    => -1,
            "download_type"      => "standard",
            "purchase_note"      => "",
            "total_sales"        => 0,
            "variations"         => [],
            "parent"             => [],
            "grouped_products"   => [],
            "menu_order"         => 0,
            "images"             => [[
            // "id"         => 14,
            // "created_at" => "2017-05-11T08:27:02Z",
            // "updated_at" => "2017-05-11T08:27:02Z",
            "src"      => $this->remoteShop . "/wp-content/uploads/2017/05/" . $slug . ".jpg",
            "title"    => $slug,
            "alt"      => $title,
            "position" => 0,
            ]],
            ];
            $this->nomad->post("products", $data);
        }
    }
    
    public function parseMetallApi()
    {
        // dd($this->nomad->get("products/categories"));
        $metalCategoryRus = "Металлоконструкции";
        // create categorie fpr metall
        $metalCategory["product_category"] = [
        "name"   => "Металлоконструкции",
        "slug"   => Rutils::translit()->slugify($metalCategoryRus),
        "parent" => 0,
        ];
        // create metall category
        // $this->nomad->post("products/categories", $metalCategory);
        
        include_once "simplehtmldom/simple_html_dom.php";
        $stroiMetall = "http://www.npommz.ru/stroitelnye-metallokonstrukcii";
        $products    = []; //products
        
        $stroiHtml = file_get_html($stroiMetall);
        
        // crete metall
        $metall                = [];
        $metall["title"]       = $stroiHtml->find(".title")[0]->plaintext;
        $metall["description"] = $stroiHtml->find(".content")[0]->innertext;
        $metall["categories"]  = [$metalCategory["product_category"]["slug"]];
        $products[]            = $metall;
        
        // create ns
        $nsLink            = "http://www.npommz.ru/nestandartnye-metallokonstrukcii";
        $nsHtml            = file_get_html($nsLink);
        $ns                = [];
        $ns["title"]       = $nsHtml->find(".title")[0]->plaintext;
        $ns["description"] = $nsHtml->find(".content")[0]->innertext;
        $ns["categories"]  = [$metalCategory["product_category"]["slug"]];
        $products[]        = $ns;
        
        // dd($products);
        
        foreach ($products as $key) {
            $keySlug         = Rutils::translit()->slugify($key["title"]);
            $data            = [];
            $data["product"] = [
            "title"              => $key['title'],
            "type"               => "simple",
            "status"             => "publish",
            "downloadable"       => false,
            "virtual"            => false,
            "permalink"          => $this->remoteShop . "/shop/" . $keySlug,
            "sku"                => "",
            "price"              => "",
            "regular_price"      => "",
            "sale_price"         => null,
            "price_html"         => "",
            "taxable"            => true,
            "tax_status"         => "taxable",
            "tax_class"          => "",
            "managing_stock"     => false,
            "stock_quantity"     => null,
            "in_stock"           => true,
            "backorders_allowed" => false,
            "backordered"        => false,
            "sold_individually"  => false,
            "purchaseable"       => false,
            "featured"           => false,
            "visible"            => true,
            "catalog_visibility" => "visible",
            "on_sale"            => false,
            "product_url"        => "",
            "button_text"        => "",
            "weight"             => null,
            "shipping_required"  => true,
            "shipping_taxable"   => true,
            "shipping_class"     => "",
            "shipping_class_id"  => null,
            "description"        => $key['description'],
            "short_description"  => "",
            "reviews_allowed"    => true,
            "average_rating"     => "0.00",
            "rating_count"       => 0,
            "related_ids"        => [],
            "upsell_ids"         => [],
            "cross_sell_ids"     => [],
            "parent_id"          => 0,
            "categories"         => $key["categories"],
            "tags"               => [],
            "attributes"         => [],
            "downloads"          => [],
            "download_limit"     => -1,
            "download_expiry"    => -1,
            "download_type"      => "standard",
            "purchase_note"      => "",
            "total_sales"        => 0,
            "variations"         => [],
            "parent"             => [],
            "grouped_products"   => [],
            "menu_order"         => 0,
            "images"             => [[
            // "id"         => 14,
            // "created_at" => "2017-05-11T08:27:02Z",
            // "updated_at" => "2017-05-11T08:27:02Z",
            "src"      => $this->remoteShop . "/wp-content/uploads/" . $imageName,
            "title"    => $slugified,
            "alt"      => $itemTitle,
            "position" => 0,
            ]],
            ];
            $this->nomad->post("products", $data);
        }
        
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
        
        foreach ($html->find("ul.products-list li a") as $link) {
            // add all links to catalog items to array
            $links[] = $link->href;
            \Log::info('"Just another parse ink for svet is $link"');
            }
        
        $items = [];
        
        foreach ($links as $link) {
            // create base link to parse
            $link_html = file_get_html($base_url . $link);
            
            //items title
            $itemTitle = $link_html->find("#content h1")[0]->plaintext; //find items title
            \Log::info('Product to add: ' . $itemTitle);
            
            $imgSrc    = $link_html->find('.img-holder img')[0]->attr['src'];
            $imageName = '2017/05/' . Rutils::translit()->slugify($itemTitle) . '.png';
            $slugified = Rutils::translit()->slugify($itemTitle);
            // \Storage::put($imageName, file_get_contents($base_url . $imgSrc));
            
            $data["product"] = [
            "title"              => "$itemTitle",
            "type"               => "simple",
            "status"             => "publish",
            "downloadable"       => false,
            "virtual"            => false,
            "permalink"          => $this->remoteShop . "/shop/" . $slugified,
            "sku"                => "",
            "price"              => "",
            "regular_price"      => "",
            "sale_price"         => null,
            "price_html"         => "",
            "taxable"            => true,
            "tax_status"         => "taxable",
            "tax_class"          => "",
            "managing_stock"     => false,
            "stock_quantity"     => null,
            "in_stock"           => true,
            "backorders_allowed" => false,
            "backordered"        => false,
            "sold_individually"  => false,
            "purchaseable"       => false,
            "featured"           => false,
            "visible"            => true,
            "catalog_visibility" => "visible",
            "on_sale"            => false,
            "product_url"        => "",
            "button_text"        => "",
            "weight"             => null,
            "shipping_required"  => true,
            "shipping_taxable"   => true,
            "shipping_class"     => "",
            "shipping_class_id"  => null,
            "description"        => $link_html->find(".item .info")[0]->outertext,
            "short_description"  => "",
            "reviews_allowed"    => true,
            "average_rating"     => "0.00",
            "rating_count"       => 0,
            "related_ids"        => [],
            "upsell_ids"         => [],
            "cross_sell_ids"     => [],
            "parent_id"          => 0,
            "categories"         => [],
            "tags"               => [],
            "images"             => [[
            // "id"         => 14,
            // "created_at" => "2017-05-11T08:27:02Z",
            // "updated_at" => "2017-05-11T08:27:02Z",
            "src"      => $this->remoteShop . "/wp-content/uploads/" . $imageName,
            "title"    => $slugified,
            "alt"      => $itemTitle,
            "position" => 0,
            ]],
            // "featured_src"       => "http://localhost/nomad/wp-content/uploads/2017/05/ZDMcAkCVqk.jpg",
            "featured_src"       => $this->remoteShop . "/wp-content/uploads/" . $imageName,
            "attributes"         => [],
            "downloads"          => [],
            "download_limit"     => -1,
            "download_expiry"    => -1,
            "download_type"      => "standard",
            "purchase_note"      => "",
            "total_sales"        => 0,
            "variations"         => [],
            "parent"             => [],
            "grouped_products"   => [],
            "menu_order"         => 0,
            ];
            $this->nomad->post("products", $data);
        }
        
    }
    
    public function testFtp()
    {
        $ftp = new FtpClient();
        $ftp->connect(env("SMARTSOL_FTP_HOST"));
        $ftp->login(env("SMARTSOL_FTP_USER"), env("SMARTSOL_FTP_PASS"));
        // dd(base_path());
        $ftp->putAll(base_path() . "\storage\app\public\wp-upload\\2017\\05", "nomadsynergy.kz/wp-content/uploads/2017/05", FTP_BINARY);
    }
    
    public function saveRequest(Request $req)
    {}
    
    public function woo()
    {
        
    }
    
    public function restApiPost()
    {
        $params = array(
        "title"   => "Hello Updated World!",
        "content" => "Howdy updated content.",
        "type"    => "product",
        );
        // dd(json_encode($params));
        $response = $this->restApiClient->post('posts',
        ['body' => json_encode($params)]
        );
        echo "<pre>";
        echo $response->getBody();
    }
    
    /**
    * claer all products from local test database
    * @return [type] [description]
    */
    public function clearProducts()
    {
        set_time_limit(0);
        $d           = $this->woocommerce->get("products");
        $idsToDelete = [];
        
        foreach ($d["products"] as $product) {
            $idsToDelete[] = $product["id"];
        }
        
        foreach ($idsToDelete as $key) {
            $this->woocommerce->delete("products/$key", ["force" => true]);
        }
        \Log::notice("Products removed from database");
    }
    // helpers
    private function getHrefs($arr = [])
    {
        $links = [];
        foreach ($arr as $i) {
            $links[] = $i->href;
        }
        return $links;
    }
    
}