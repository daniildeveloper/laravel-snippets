<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use \Auth;
use Epay\Client;

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
            "products" => $products,
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
        $cart    = new Cart($oldCart);
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
        $cart    = new Cart($oldCart);
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
        $cart    = new Cart($oldCart);
        $total   = $cart->totalPrice;

        return view("shop.checkout", [
            'total' => $total,
        ]);
    }

    public function checkout(Request $request)
    {
        if (!Session::has("cart")) {
            //if no cart, redirect to cart
            return redirect("shop");
        }

        Stripe::setApiKey("sk_test_X9dtCSFHT6ymHhKWi2O0ke7k");

        $oldCart = Session::get("cart");
        $cart    = new Cart($oldCart);

        try {
            $charge = Charge::create([
                "amount"      => $cart->totalPrice * 100,
                "currency"    => "usd",
                "source"      => $request['stripeToken'],
                "description" => "testCharge",
            ]); //return in stripe charge payement id
            $order             = new Order();
            $order->cart       = serialize($cart);
            $order->address    = $request['address'];
            $order->name       = $request['name'];
            $order->user_id    = Auth::user()->id;
            $order->payment_id = $charge->id;
            $order->save();

        } catch (\Exception $e) {
            dd($e);
            return redirect()->route("shop.index", [
                "message"       => $e->getMessage(),
                "messageStatus" => "danger"]);
        }

        Session::forget("cart");
        return redirect()->route("shop.index", ["message" => "You have byed some successfull", "messageStatus" => "success"]);
    }
}
