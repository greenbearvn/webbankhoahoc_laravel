<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;

class Site extends Controller
{
    public function Home(){

        $lists = danhmuc::all();
        return View('content',['lists'=> $lists]);
    }

    
}
