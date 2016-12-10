<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ShoppingCartController extends Controller
{
    /**
     * show all wares
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showShopIndex()
    {
        $products = Product::all();
        return view("shop.index", [
            "products" => $products
        ]);
    }

    /**
     * add item to cart
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has("cart") ? Session::get("cart") : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function incrementItemInCart(Request $request, $id)
    {
        $this->addToCart($request, $id);

        return redirect()->back();

    }

    public function decrementItemInCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has("cart") ? Session::get("cart") : null;
        $cart = new Cart($oldCart);
        $cart->removeFromCart($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();

    }

    public function showCart()
    {
//        dd(Session::get("cart"));
        return view("shop.cart");
    }

    public function seed()
    {
        DB::table('products')->insert([
            'imagePath' => "/images/shop/book1.jpg",
            "title" => "Book",
            'description' => "Super cool bo",
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
