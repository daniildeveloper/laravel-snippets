<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \FTP;

class FTPController extends Controller
{
    /**
     * list all dirs
     * @return [type] [description]
     */
    public function dirListExample()
    {
        $res = \FTP::connection("smartsol")->getDirListing();
        dd($res);
    }

    public function allMethods() {
      //to reconnect
      FTP::reconnect('smartsol');

      //to disconnect
      FTP::disconnect('smartsol');

      // create directory
      $status = FTP::connection()->makeDir('directory-name');

      // change current directory
      $status = FTP::connection()->changeDir('directory-name');

      // upload file
      // download fiel
      $status = FTP::connection()->uploadFile("file_from", "fileTo", "mode");
      $status = FTP::connection()->downloadFile("file_from", "fileTo", "mode");
    }
    protected function saveRequest(Request $request)
    {}
}
