<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingIdeasController extends Controller
{
    public function test(Request $request)
    {
        $pay = \Epay::basicAuth([
            'order_id' => 01111111111,
            'currency' => '398',
            'amount'   => 9999,
            'hashed'   => true,
        ]);

        $pay->generateUrl();
        dd($pay);
    }
}
