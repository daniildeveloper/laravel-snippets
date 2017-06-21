<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Mail;

class TestingIdeasController extends Controller
{
    public function test(Request $request)
    {
        Mail::to("daniilborowkow@yandex.ru")->send(new TestMail());
    }

    public function sendPay()
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
