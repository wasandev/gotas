<?php

namespace Wasandev\TranjobEntry\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant\Tranjob;
use App\Models\Tenant\Counter;
use DB;

class TranjobController extends Controller
{
    public function index()
    {
        $results = Tranjob::with(['customer_sender', 'customer_reciever', 'branch_send', 'branch_rec'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);



        return response()->json(['results' => $results]);
    }

    public function create()
    {

        $counter = Counter::where('key', 'tranjob')->first();

        $form = [
            'tranjob_no' => $counter->prefix . $counter->value,
            'branchsend_id' => null,
            'branchsend' => null,
            'branchrec_id' => null,
            'branchrec' => null,
            'sender_id' => null,
            'sender' => null,
            'reciever_id' => null,
            'reciever' => null,
            'tranjob_date' => date('Y-m-d'),
            'senddate' => null,
            'reference' => null,
            'discount' => 0,
            'terms_and_conditions' => 'Default Terms',
            'tranjob_details' => [
                [
                    'product_id' => null,
                    'product' => null,
                    'unit_id' => null,
                    'unit' => null,
                    'tranprice' => 0,
                    'amount' => 1
                ]
            ]
        ];

        return response()
            ->json(['form' => $form]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'branchsend_id' => 'required|integer|exists:branches,id',
            'branchrec_id' => 'required|integer|exists:branches,id',
            'sender_id' => 'required|integer|exists:customers,id',
            'reciever_id' => 'required|integer|exists:customers,id',
            'tranjob_date' => 'required|date_format:Y-m-d',
            'senddate' => 'required|date_format:Y-m-d',
            'reference' => 'nullable|max:100',
            'discount' => 'required|numeric|min:0',
            'terms_and_conditions' => 'required|max:2000',
            'tranjob_details' => 'required|array|min:1',
            'tranjob_details.*.product_id' => 'required|integer|exists:products,id',
            'tranjob_details.*.unit_id' => 'required|integer|exists:units,id',
            'tranjob_details.*.tranprice' => 'required|numeric|min:0',
            'tranjob_details.*.amount' => 'required|integer|min:1'
        ]);

        $tranjob = new Tranjob;
        $tranjob->fill($request->except('tranjob_details'));

        $tranjob->sub_total = collect($request->tranjob_details)->sum(function ($item) {
            return $item['amount'] * $item['tranprice'];
        });

        $tranjob = DB::transaction(function () use ($tranjob, $request) {
            $counter = Counter::where('key', 'tranjob')->first();
            $tranjob->tranjob_no = $counter->prefix . $counter->value;

            // custom method from app/Helper/HasManyRelation
            $tranjob->storeHasMany([
                'tranjob_details' => $request->tranjob_details
            ]);

            $counter->increment('value');

            return $tranjob;
        });

        return response()
            ->json(['saved' => true, 'id' => $tranjob->id]);
    }

    public function show($tranjobId)
    {
        $model = Tranjob::with(['customer_sender', 'tranjob_details.product'])
            ->findOrFail($tranjobId);

        return response()
            ->json(['model' => $model]);
    }

    public function edit($id)
    {
        $form = Tranjob::with(['customer', 'tranjob_details.product'])
            ->findOrFail($id);

        return response()
            ->json(['form' => $form]);
    }

    public function update($id, Request $request)
    {
        $tranjob = Tranjob::findOrFail($id);

        $request->validate([
            'branchsend_id' => 'required|integer|exists:branches,id',
            'branchrec_id' => 'required|integer|exists:branches,id',
            'sender_id' => 'required|integer|exists:customers,id',
            'reciever_id' => 'required|integer|exists:customers,id',
            'tranjob_date' => 'required|date_format:Y-m-d',
            'senddate' => 'required|date_format:Y-m-d',
            'reference' => 'nullable|max:100',
            'discount' => 'required|numeric|min:0',
            'terms_and_conditions' => 'required|max:2000',
            'tranjob_details' => 'required|array|min:1',
            'tranjob_details.*.id' => 'sometimes|required|integer|exists:tranjob_details,id,tranjob_id,' . $tranjob->id,
            'tranjob_details.*.product_id' => 'required|integer|exists:products,id',
            'tranjob_details.*.unit_id' => 'required|integer|exists:units,id',
            'tranjob_details.*.tranprice' => 'required|numeric|min:0',
            'tranjob_details.*.amount' => 'required|integer|min:1'
        ]);

        $tranjob->fill($request->except('tranjob_details'));

        $tranjob->sub_total = collect($request->tranjob_details)->sum(function ($item) {
            return $item['qty'] * $item['unit_price'];
        });

        $tranjob = DB::transaction(function () use ($tranjob, $request) {
            // custom method from app/Helper/HasManyRelation
            $tranjob->updateHasMany([
                'tranjob_details' => $request->tranjob_details
            ]);

            return $tranjob;
        });

        return response()
            ->json(['saved' => true, 'id' => $tranjob->id]);
    }

    public function destroy($id)
    {
        $tranjob = Tranjob::findOrFail($id);

        $tranjob->tranjob_details()->delete();

        $tranjob->delete();

        return response()
            ->json(['deleted' => true]);
    }
}
