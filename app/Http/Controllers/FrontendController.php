<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{ 
    public function index() {
      return view("frontend.index");
    }
    /**
     * base experiment with dropzone.js(multiple ile download)
     * @return [type] [description]
     */
    public function dropzone() {
      return view("frontend.dropzone.index");
    }
}
