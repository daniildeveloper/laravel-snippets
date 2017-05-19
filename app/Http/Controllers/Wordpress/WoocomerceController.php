<?php

namespace App\Http\Controllers\Wordpress;

use App\Http\Controllers\Controller;
use Automattic\WooCommerce\Client;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;

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
    }

    public function test()
    {
        $params = array(
            "title"       => "Hello Updated World!",
            "content_raw" => "Howdy updated content.",
            "date"        => "2017-02-01T14:00:00+10:00",
        );
        // dd(json_encode($params));
        $response = $this->restApiClient->post('posts',
            ['body' => json_encode($params)]
        );
        echo "<pre>";
        echo $response->getBody();
    }

    public function saveRequest(Request $req)
    {}

    public function woo()
    {
        $title = "Some product";
        $data  = [
            "id"                 => 12312321,
            "title"              => "Some product",
            // "id"                 => 166,
            "created_at"         => "2017-05-17T14:24:46Z",
            "updated_at"         => "2017-05-17T14:26:23Z",
            "type"               => "simple",
            "status"             => "publish",
            "downloadable"       => false,
            "virtual"            => false,
            "permalink"          => "http://localhost/nomad/shop/$title",
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
            "description"        => "<p>sdsadsadsa</p>\n",
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
                "id"         => 14,
                "created_at" => "2017-05-11T08:27:02Z",
                "updated_at" => "2017-05-11T08:27:02Z",
                "src"        => "http://localhost/nomad/wp-content/uploads/2017/05/ZDMcAkCVqk.jpg",
                "title"      => "_ZDMcAkCVqk",
                "alt"        => "",
                "position"   => 0,
            ]],
            "featured_src"       => "http://localhost/nomad/wp-content/uploads/2017/05/ZDMcAkCVqk.jpg",
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
        // dd($this->woocommerce->get("products"));
        $this->woocommerce->post("products", $data);
    }
}
