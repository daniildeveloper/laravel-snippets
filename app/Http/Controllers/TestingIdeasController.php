<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Mail;

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

        $payUrl = $pay->generateUrl();
        dd(urldecode($payUrl));
        return view('snippets.pay.epay.paytest', [
                "content" => $payUrl
            ]);

    }

    public function sendPay()
    {
        $pay = \Epay::basicAuth([
            'order_id' => 01111111111,
            'currency' => '398',
            'amount'   => 9999,
            'hashed'   => true,
        ]);

        $payUrl = $pay->generateUrl();
        return view('snippets.pay.epay.paytest');
    }

    public function testMail()
    {
        Mail::to("daniilborowkow@yandex.ru")->send(new TestMail());
    }
}
