<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    //
    function showData()
    {
        $data = [
            "name"=>[
                "Arpan",
                "Arnab",
                "Anurag",
                "Rakesh"
            ]
            ];
        return view('user',$data);
    }
}
