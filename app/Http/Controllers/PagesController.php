<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = "Welcome to Laravel";
        return view('pages/index',compact("title"));
    }
    public function about(){
        $data = array(
            'title' => "خدماتنا",
            'serveses' => ['تحليل','تطوير','يرمجة']
        );
        return view('pages/about')->with($data);
    }
    public function home(){
        return view('pages/home');
    }
}
