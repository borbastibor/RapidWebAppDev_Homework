<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\SiteCode;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        switch ($id) {
            case SiteCode::ABOUT:
                return view('about');
            
            case SiteCode::CONTACT:
                return view('contact');

            case SiteCode::GALLERY:
                return view('gallery');

            case SiteCode::INFO:
                return view('info');

            case SiteCode::SUPPORT:
                return view('supporters');
        }

        return view('home');
    }
}
