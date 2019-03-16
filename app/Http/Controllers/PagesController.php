<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Pagina principala';
        return view('pages.index')->with('title', $title);
    } 

    public function about(){
        $title = 'Despre';
        return view('pages.about')->with('title', $title);
    }
}
