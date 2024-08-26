<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $data['meta_title'] = 'E-Commerce';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('home', $data);
    }
}
