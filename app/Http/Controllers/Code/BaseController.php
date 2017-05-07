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

    /**
     * primitive alghorithm to check if is point inside araay
     * @param  int $polygonsCount count of polygons in array
     * @param  array $polyX         all x coords of corners
     * @param  array $polyY         all y coords of corners
     * @param  float $x             x-coord of point to find
     * @param  float $y             y-coord of point to find
     * @return boolean                is inside
     */
    public function checkForInside($polySides, $polyX, $polyY, $x, $y)
    {
        $j        = $polySides - 1;
        $oddNodes = 0;
        for ($i = 0; $i < $polySides; $i++) {
            if ($polyY[$i] < $y && $polyY[$j] >= $y
                || $polyY[$j] < $y && $polyY[$i] >= $y) {
                if ($polyX[$i] + ($y - $polyY[$i]) / ($polyY[$j] - $polyY[$i]) * ($polyX[$j] - $polyX[$i]) < $x) {
                    $oddNodes = !$oddNodes;}}
            $j = $i;}

        return $oddNodes;
    }


}
