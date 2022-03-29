<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    //
    public function index(){
        $title = "Welcome to BlogSystrm";
        return view('pages/index',compact("title"));
    }

    public function home(){
        return view('pages/home');
    }
}
