@extends('layouts.form')

@section('header')
@include('partials.docheader')
@endsection

@section('content')
<table style="width:100%;">
    <tr>
        <h1 style="text-align: center;font-size: 2.5em;">
            ใบเสนอราคา (Quotation)
        </h1>
    </tr>
</table>
<table style="width:100%">
    <tr>
        <td style="vertical-align: top;">
            ลูกค้า/Customer: {{ $quotation->customer->name }}<br />
            ที่อยู่/Address : {{ $quotation->customer->address.'
                     '.$quotation->customer->sub_district .'
                     '.$quotation->customer->district .' '.$quotation->customer->province .'
                    '.$quotation->customer->postal_code }}<br />
            โทร./Phone No.: {{ $quotation->customer->phoneno }} อีเมล์/Email: {{ $quotation->customer->email }}
        </td>
        <td style="vertical-align: top;">
            เลขที่ใบเสนอราคา/Quotation No:{{ $quotation->quotation_no }}<br />
            วันที่ออกใบเสนอราคา/Date Of Issue :{{ $quotation->quotation_date }}<br />
            ใช้ได้ถึงวันที่/Expireation Date :{{ $quotation->expiration_date }}


        </td>
    </tr>

</table>
<br />
<br />
<table style="width:100%;border: .5px solid black; border-collapse: collapse;">
    <thead>
        <tr style="vertical-align: middle;height: 50px;border: 1px solid black;text-align: center;">
            <th style="border: 1px solid black;">ลำดับ<br />
                No.</th>
            <th style="border: 1px solid black;">เส้นทางขนส่ง ต้นทาง-ปลายทาง<br />Route</th>
            <th style="border: 1px solid black;">ประเภทรถ<br />Vehicle Type</th>
            <th style="border: 1px solid black;">ลักษณะรถ<br />Vehicle Category</th>
            <th style="border: 1px solid black;">ค่าขนส่ง<br />Price/Vehicle(Baht)</th>
            <th style="border: 1px solid black;">จำนวนจุดขึ้นลงสินค้า<br />Maximum Point</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($quotation->charter_prices as $item )
        <tr>

            <td style="border: 1px solid black;text-align: center;">
                {{ $loop->iteration }}
            </td>
            <td style="border: 1px solid black;">
                {{ $item->charter_route->branch_area->district .'/'.$item->charter_route->branch_area->province .' - '.$item->charter_route->to_district .'/'.$item->charter_route->to_province   }}
            </td>
            <td style="border: 1px solid black;">
                {{ $item->cartype->name }}
            </td>
            <td style="border: 1px solid black;">
                {{ $item->carstyle->name }}
            </td>
            <td style="border: 1px solid black;text-align: right;">
                {{ number_format($item->price,2) }}
            </td>
            <td style="border: 1px solid black;text-align: center;">
                {{ $item->pickuppoint }}
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@section('footer')
@include('partials.docfooter')
@endsection


@endsection
