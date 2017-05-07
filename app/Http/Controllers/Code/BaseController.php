<?php

namespace App\Http\Controllers\Code;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{   
  /**
   * show categorie view
   * @param  [type] $categorie [description]
   * @param  [type] $slug      [description]
   * @return [type]            [description]
   */
    public function showView($categorie, $slug) {
      return view("code.$categorie.$slug");
    }
}
