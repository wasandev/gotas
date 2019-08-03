<?php

namespace App\Http\Controllers\Tenant;



use App\Nova\Templates\About;
use Whitecube\NovaPage\Pages\Manager;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function show(Manager $page)
    {
        $page->load('about', About::class);
        return view('pages.about');
    }
}
