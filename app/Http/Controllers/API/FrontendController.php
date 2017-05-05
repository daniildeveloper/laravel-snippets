<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    use Helpers;
    /**
     * show all products
     * @return [type] [description]
     */
    public function products()
    {

        $products = Product::all();
        return $this->response()->array($products->toArray());

    }

    public function index(Request $r)
    {}
}
