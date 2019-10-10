<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CompanyProfile;

class TenantController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $company = CompanyProfile::find(1);

        return view('tenants.index', compact('company'));
    }
}
