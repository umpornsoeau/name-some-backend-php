<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class IndexController extends Controller
{

    public function index() {

/*
        foreach($_ENV as $key => $value) {
            echo $key." => ".$value."<br/>";
        }
 */

        //$appname = env('APP_NAME');
        $appname = config('namesome.appname');

        $data = [
            'appname' => $appname,
        ];

        return view('index', $data);
    }


}


