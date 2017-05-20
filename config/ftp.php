<?php
return array(

    /*
	|--------------------------------------------------------------------------
	| Default FTP Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the FTP connections below you wish
	| to use as your default connection for all ftp work.
	|
	*/

    'default' => 'connection1',

    /*
    |--------------------------------------------------------------------------
    | FTP Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the FTP connections setup for your application.
    |
    */

    'connections' => array(

        'smartsol' => array(
            'host'   => env("SMARTSOL_FTP_HOST"),
            'port'  => 21,
            'username' => env("SMARTSOL_FTP_USER"),
            'password'   => env("SMARTSOL_FTP_PASS"),
            'passive'   => false,
        ),
    ),
);