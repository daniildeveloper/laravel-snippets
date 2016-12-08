<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function showShopIndex()
    {
        return view("shop.index");
    }
}
