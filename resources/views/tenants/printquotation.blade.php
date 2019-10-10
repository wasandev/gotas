@extends('layouts.app')
@section('nav')
    @include('partials.docheader')
@endsection
@section('content')
    <div class="max-w-3xl mx-auto -mt-16">
        <div class="mx-0 sm:mx-6">
            <h1 class="text-center">
                ใบเสนอราคา (Quotation)
            </h1>
            <div class=" bg-indigo-darker bg-transparent w-full p-4 md:p-4 t text-white leading-normal rounded-lg" style="opacity: .75;" >
                <p class="text-2xl md:text-3xl text-center ">
                    เลขที่ใบเสนอราคา : {{ $quotation->quotation_no }}

                </p>
                <p class="py-2 text-base text-white text-center mt-4">
                    วันที่ใบเสนอราคา : {{ $quotation->quotation_date }}
                </p>
                <p>
                    ลูกค้า : {{ $quotation->customer->name }}
                </p>
                <p>
                    ที่อยู่ : {{ $quotation->customer->address.' ตำบล/แขวง
                     '.$quotation->customer->sub_district .' อำเภอ/เขต
                     '.$quotation->customer->district .' จังหวัด '.$quotation->customer->province .'
                    '.$quotation->customer->postal_code .' โทร. :
                    '.$quotation->customer->phoneno }}
                </p>

            </div>
        </div>
    </div>
    <table class="border-grey-darker border-solid">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>เส้นทางขนส่ง ต้นทาง-ปลายทาง</th>
                <th>ประเภทรถ</th>
                <th>ลักษณะรถ</th>
                <th>ค่าขนส่ง</th>
                <th>จำนวนจุดขึ้นลงสินค้า</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($quotation->charter_prices as $item )
                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $item->charter_route->branch_area->district .'/'.$item->charter_route->branch_area->province .' - '.$item->charter_route->to_district .'/'.$item->charter_route->to_province   }}
                    </td>
                    <td>
                        {{ $item->cartype->name }}
                    </td>
                    <td>
                        {{ $item->carstyle->name }}
                    </td>
                    <td>
                        {{ $item->price }}
                    </td>
                    <td>
                        {{ $item->pickuppoint }}
                    </td>

                </tr>
             @endforeach

        </tbody>
    </table>



@endsection
@section('footer')
    @include('partials.docfooter')

@endsection

<style>
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: normal;
 src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: bold;
 src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: normal;
 src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: bold;
 src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
}
body{
 font-family: "THSarabunNew";
}
</style>
