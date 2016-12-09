<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    public function showShopIndex()
    {
        $products = Product::all();
        return view("shop.index", [
            "products" => $products
        ]);
    }

    public function seed()
    {
        DB::table('products')->insert([
            'imagePath' => "/images/shop/book1.jpg",
            "title" => "Book",
            'description' => "Super cool book",
            "price" => 10
        ]);
        DB::table('products')->insert([
            'imagePath' => "/images/shop/laravel_up.jpg",
            "title" => "Laravel Up",
            'description' => "Book about laravel framework",
            "price" => 12
        ]);
        DB::table('products')->insert([
            'imagePath' => "/images/shop/mastering_laravel.jpg",
            "title" => "Mastering Laravel",
            'description' => "Cool book about laravel in development and production",
            "price" => 18
        ]);
        DB::table('products')->insert([
            'imagePath' => "/images/shop/modern_php.jpg",
            "title" => "Modern PHP",
            'description' => "Book about new version of php, design patterns and best practices.",
            "price" => 24
        ]);
        DB::table('products')->insert(['imagePath' => "/images/shop/vuejs.jpg",
            "title" => "Vue js book",
            'description' => "One of the best front-end frameworks for web-application. Loved by laravel ecosystem.",
            "price" => 9]);
        return redirect()->back();
    }

}
