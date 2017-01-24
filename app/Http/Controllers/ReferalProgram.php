<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferalProgram extends Controller
{
   public function refererToSession(Request $request, $id) {
      $request->session()->put('referer', $id);
      // dd($request->session()->get('referer'));
      return redirect()->back();
   } 
}
