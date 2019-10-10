<?php

namespace App\Http\Controllers\Tenant;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Quotation;
use App\Models\Tenant\CompanyProfile;
use PDF;
use Illuminate\Support\Facades\Storage;

class QuotationController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
    }

    public function preview($quotation)
    {

        $company = CompanyProfile::find(1);
        $quotation = Quotation::find($quotation);
        return view('tenants.printquotation', compact('quotation', 'company'));
    }



    public function makePDF($quotation)
    {
        $company = CompanyProfile::find(1);
        $quotation = Quotation::find($quotation);


        $pdf = PDF::loadView('tenants.printquotation', compact('quotation', 'company'));

        $path =  Storage::disk('tenant')->getAdapter()->getPathPrefix() . 'media/' . $quotation->quotation_no . '.pdf';
        $pdf->save($path);
        // //$pdf->stream($path);

        return $path;
    }
}
