<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Rules\ValidSubdomain;
use App\Rules\UniqueSubdomain;
use App\Jobs\System\CreateTenant;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'new']);
    }

    public function showSetup()
    {
        return view('members.setup');
    }

    public function setup()
    {
        request()->validate([
            'subdomain' => ['required', new ValidSubdomain, new UniqueSubdomain],
            'company_name' => ['required'],
            'phoneno' => ['required'],
            'taxid' => ['required']
        ]);

        CreateTenant::dispatch(
            auth()->user(),
            tenant_fqdn(request('subdomain')),
            request('company_name'),
            request('phoneno'),
            request('taxid')
        );

        return redirect('/home');
    }
}
