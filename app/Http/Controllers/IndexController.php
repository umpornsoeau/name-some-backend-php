<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class IndexController extends Controller
{

    public function index() {
        //$appname = env('APP_NAME');

/*
        foreach($_ENV as $key => $value) {
            echo $key." => ".$value."<br/>";
        }
 */

        $appname = config('namesome.appname');
        return $appname."<br/>".str_repeat("=", strlen($appname))."<br/>using Laravel/Lumen";
    }


}


