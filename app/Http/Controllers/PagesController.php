<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {

        return view('pages.index');

    }

    public function terms()
    {

        return view('pages.terms');

    }

    public function privacy()
    {

        return view('pages.privacy');

    }
    public function contact()
    {

        return view('pages.contact');

    }
}
