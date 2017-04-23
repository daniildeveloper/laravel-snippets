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
    /**
     * show cart
     * @return [type] [description]
     */
    public function showCart()
    {
        return view("shop.cart");
    }



    public function getCheckout()
    {
        //have we cart already
        if (!Session::has("cart")) {
            //if no cart, redirect to cart
            return redirect("shop");
        }
        $oldCart = Session::get("cart");
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view("shop.checkout", [
            'total' => $total
        ]);
    }

    public function checkout() {
        
    }
}
