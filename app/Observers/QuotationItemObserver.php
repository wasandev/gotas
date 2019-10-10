<?php

namespace App\Observers;


use App\Models\Tenant\Quotation_item;
use App\Models\Tenant\Quotation;

class QuotationItemObserver
{
    public function created(Quotation_item $quotation_item)
    {

        $quotation = Quotation::find($quotation_item->quotation_id);

        $sub_total = $quotation->sub_total;
        $discount = $quotation->discount;
        $tax_amount = $quotation->tax_amount;
        $total = $quotation->total;

        Quotation::where('id', $quotation_item->quotation_id)
            ->update([
                'sub_total' => $sub_total + $quotation_item->amount,
                'tax_amount' => $tax_amount + ($quotation_item->amount / 100),
                'total' => $total + ($quotation_item->amount - $discount - ($quotation_item->amount / 100)),

            ]);
    }



    public function updated(Quotation_item $quotation_item)
    {
        $quotation = Quotation::find($quotation_item->quotation_id);

        $sub_total = $quotation->sub_total;
        $discount = $quotation->discount;
        $tax_amount = $quotation->tax_amount;
        $total = $quotation->total;

        Quotation::where('id', $quotation_item->quotation_id)
            ->update([
                'sub_total' =>  $quotation_item->amount,
                'tax_amount' => $quotation_item->amount / 100,
                'total' => $quotation_item->amount - $discount - ($quotation_item->amount / 100),

            ]);
    }
    public function deleting(Quotation_item $quotation_item)
    {
        $quotation = Quotation::find($quotation_item->quotation_id);

        $sub_total = $quotation->sub_total;
        $discount = $quotation->discount;
        $tax_amount = $quotation->tax_amount;
        $total = $quotation->total;

        Quotation::where('id', $quotation_item->quotation_id)
            ->update([
                'sub_total' => $sub_total - $quotation_item->amount,
                'tax_amount' => $tax_amount - ($quotation_item->amount / 100),
                'total' => $total - ($quotation_item->amount - $discount - ($quotation_item->amount / 100)),

            ]);
    }
}
