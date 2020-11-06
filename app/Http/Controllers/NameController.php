<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class NameController extends Controller
{

    public function random($amount = 10)
    {
        if ($amount < 1) return response()->json(['code' => '400']);
        if ($amount > 100) return response()->json(['code' => '403']);
        return response()->json(['code' => '200', 'data' => $amount]);
    }



}


