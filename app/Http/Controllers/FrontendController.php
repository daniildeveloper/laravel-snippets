<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{   
    public function showPen($categorie, $slug) {
        return view("frontend.$categorie.$slug");
    }
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

    /**
     * ========================================================
     * AUTOCOMPLETE
     * ========================================================
     */
    
    public function autocompletePure() {
        return view("frontend.autocomplete.pure");
    }
}
