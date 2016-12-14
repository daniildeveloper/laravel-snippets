<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonReturnController extends Controller
{
    public function getShop()
    {
        $products = DB::table("products")->get();
        $response = [];

        foreach ($products as $p) {
            $res = [];
            $res['imagePath'] = $p->imagePath;
            $res["title"] = $p->title;
            $res['description'] = $p->description;
            $res["price"] = $p->price;
            $res['id'] = $p->id;
            $response[$p->id] = $res;
        }
//        dd($response);
        return response()->json($response);
    }
}
