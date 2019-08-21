<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\User;
use App\Models\System\Website;
use App\Models\System\Hostname;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'set-up']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            $fqdn = $user->website->hostnames->first()->fqdn;
            $company =  $user->website->first()->company_name;
            return view('members.home', compact('fqdn', 'company'));
        }
    }
}
