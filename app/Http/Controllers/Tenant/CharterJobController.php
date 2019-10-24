<?php

namespace App\Http\Controllers\Tenant;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Charter_job;
use App\Models\Tenant\CompanyProfile;
use PDF;
use Illuminate\Support\Facades\Storage;

class CharterJobController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
    }

    public function preview($charterjob)
    {

        $company = CompanyProfile::find(1);
        $charterjob = Charter_job::find($charterjob);





        return view('tenants.printcharterjob', compact('charterjob', 'company'));
    }



    public function makePDF($charterjob)
    {
        $company = CompanyProfile::find(1);
        $charterjob = Charter_job::find($charterjob);



        $pdf = PDF::loadView('tenants.printcharterjob', compact('charterjob', 'company'));

        $path =  Storage::disk('tenant')->getAdapter()->getPathPrefix() . 'media/' . $charterjob->job_no . '.pdf';
        $pdf->save($path);

        return $path;
    }
}
