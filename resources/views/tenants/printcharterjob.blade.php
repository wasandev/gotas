@extends('layouts.form')

@section('header')
@include('partials.jobheader')
@endsection

@section('content')

<table style="width:100%">
    <tr>
        <td style="vertical-align: top;">
            ลูกค้า/Customer: {{ $charterjob->customer->name }}<br />
            เลขประจำตัวผู้เสียภาษี/Tax ID: {{$charterjob->customer->taxid }}<br />
            ที่อยู่/Address : {{ $charterjob->customer->address.'
                     '.$charterjob->customer->sub_district .'
                     '.$charterjob->customer->district .' '.$charterjob->customer->province .'
                    '.$charterjob->customer->postal_code }}<br />
            โทร./Phone No.: {{ $charterjob->customer->phoneno }} อีเมล์/Email: {{ $charterjob->customer->email }}
        </td>
        <td style="vertical-align: top;">
            เลขที่ใบงานขนส่ง/Freight Bill No:{{ $charterjob->job_no }}<br />
            วันที่ออกใบเอกสาร/Date Of Issue :{{ $charterjob->job_date }}<br />
            เงื่อนไขการชำระเงิน/Payment Method :{{ $charterjob->paymenttype }}<br />
            เอกสารอ้างอิง/Referance :{{$charterjob->referance}}<br />
            ใบเสนอราคา/Quotation No. :{{$charterjob->quotation}}<br />

        </td>
    </tr>

</table>


ค่าขนส่ง / Delivery Service Charge:
<table style="width:100%;border: .5px solid black; border-collapse: collapse;">
    <thead>
        <tr style="vertical-align: middle;height: 30px;border: 1px solid black;text-align: center;">
            <th style="border: 1px solid black;width=5%">ลำดับ<br />
                No.</th>
            <th style="border: 1px solid black;width=40%;">เส้นทางขนส่ง ต้นทาง-ปลายทาง<br />Route</th>
            <th style="border: 1px solid black;width=15%;">ประเภทรถ<br />Vehicle Type</th>
            <th style="border: 1px solid black;width=20%">ลักษณะรถ<br />Vehicle Category</th>
            <th style="border: 1px solid black;width=10%">จำนวนจุดขึ้นลงสินค้า<br />Maximum Point</th>
            <th style="border: 1px solid black;width=10%">ค่าขนส่ง<br />Price/Vehicle(Baht)</th>

        </tr>
    </thead>
    <tbody>
        <tr style="vertical-align: top;border: 1px solid black;">
            <td style="border: 1px solid black;text-align: center;">
                1.
            </td>
            <td style="border: 1px solid black;">
                {{ $charterjob->charter_price->charter_route->branch_area->district .'/'.$charterjob->charter_price->charter_route->branch_area->province .' - '.$charterjob->charter_price->charter_route->to_district .'/'.$charterjob->charter_price->charter_route->to_province   }}
            </td>
            <td style="border: 1px solid black;">
                {{ $charterjob->charter_price->cartype->name }}
            </td>
            <td style="border: 1px solid black;">
                {{ $charterjob->charter_price->carstyle->name }}
            </td>
            <td style="border: 1px solid black;text-align: center;">
                {{ $charterjob->charter_price->pickuppoint }}
            </td>
            <td style="border: 1px solid black;text-align: right;">
                {{ number_format($charterjob->charter_price->price,2) }}
            </td>


        </tr>



    </tbody>
</table>

{{-- รายการจุดรับส่ง และรายการสินค้า --}}
จุดรับ-ส่งสินค้า/รายการสินค้า/Delivery Service Information.
<table style="width:100%;border: .5px solid black; border-collapse: collapse;">
    <thead>
        <tr style="vertical-align: middle;height: 30px;border: 1px solid black;text-align: center;">
            <th style="border: 1px solid black;width=10%">ลำดับ<br />
                No.</th>
            <th style="border: 1px solid black;width=30%">จุดรับสินค้า<br />Receive Point</th>
            <th style="border: 1px solid black;width=30%">จุดส่งสินค้า<br />Delivery Point</th>
            <th style="border: 1px solid black;width=10%">ชื่อสินค้า<br />Product Name</th>
            <th style="border: 1px solid black;width=10%">จำนวน<br />Quantity</th>
            <th style="border: 1px solid black;width=10%">น้ำหนักรวม(กก.)<br />Total Weight (kg.)</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($charterjob->charter_job_items as $item )
        <tr style="vertical-align: top;border: 1px solid black;">

            <td style="border: 1px solid black;text-align: center;">
                {{ $loop->iteration }}
            </td>
            <td style="border: 1px solid black;">
                {{ $item->from_address->address .' '.$item->from_address->sub_district}}<br /> {{$item->from_address->district .' '.
                $item->from_address->province .' '
                .$item->from_address->postal_code
                }} <br>
                ชื่อผู้ติดต่อ/Contact person: {{$item->from_address->contactname}} <br />
                โทร./Tel. : {{$item->from_address->phoneno}}

            </td>
            <td style="border: 1px solid black;">
                {{ $item->to_address->address .' '.$item->to_address->sub_district}}<br /> {{$item->to_address->district .' '.
                                $item->to_address->province .' '
                                .$item->to_address->postal_code
                                }} <br>
                ชื่อผู้ติดต่อ/Contact person: {{$item->to_address->contactname}} <br />
                โทร./Tel. : {{$item->to_address->phoneno}}
            </td>
            <td style="border: 1px solid black;">
                {{$item->product->name}}
            </td>
            <td style="border: 1px solid black;text-align: right;">
                {{number_format($item->amount,2).'/'.$item->product->unit->name}}
            </td>

            <td style="border: 1px solid black;text-align: center;">
                {{number_format($item->total_weight,2)}}
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
{{--ค่าบริการเสริมอื่นๆ--}}
ค่าบริการเสริมอื่นๆ/Delivery Service Charge.
<table style="width:100%;border: .5px solid black; border-collapse: collapse;">
    <thead>
        <tr style="vertical-align: middle;height: 30px;border: 1px solid black;text-align: center;">
            <th style="border: 1px solid black;width:5%">ลำดับ<br />
                No.</th>
            <th style="border: 1px solid black;width:60%">ชื่อบริการ<br />Service Name</th>
            <th style="border: 1px solid black;width:35%">ค่าบริการ(บาท)<br />Service Charge(Baht)</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($charterjob->service_charges as $service_charge )
        <tr>

            <td style="border: 1px solid black;text-align: center;">
                {{ $loop->iteration }}
            </td>
            <td style="border: 1px solid black;">
                {{$service_charge->name}}

            </td>
            <td style="border: 1px solid black;text-align: right;">
                {{ number_format($service_charge->amount,2) }}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

{{--รวมจำนวนเงิน--}}

<table style="width:100%;border: .5px solid black; border-collapse: collapse;">

    <tr>
        <td style="width:65%;border: 1px solid black;text-align: right;">
            รวมค่าบริการ(บาท)/Sub Total
        </td>
        <td style="width:35%;border: 1px solid black;text-align: right;">
            {{ number_format($charterjob->sub_total + $charterjob->service_charges()->sum('amount'),2) }}
        </td>
    </tr>
    <tr>
        <td style="width:65%;border: 1px solid black;text-align: right;">
            ส่วนลด(บาท)/Discount(Baht)
        </td>
        <td style="width:35%;border: 1px solid black;text-align: right;">
            {{ number_format($charterjob->discount ,2) }}
        </td>
    </tr>
    <tr>
        <td style="width:65%;border: 1px solid black;text-align: right;">
            รวมจำนวนเงิน(บาท)/Total(Baht)
        </td>
        <td style="width:35%;border: 1px solid black;text-align: right;">
            {{ number_format($charterjob->sub_total +$charterjob->service_charges()->sum('amount') - $charterjob->discount ,2) }}
        </td>
    </tr>
</table>
<br />
<table style="width:100%;border: .5px solid black;border-radius: 5px;">
    <thead>
        <tr style="vertical-align: middle;text-align: center;background-color: #cccccc;">
            <th style="border-right: 1px solid black;width:25%">ผู้ว่าจ้าง/Customer</th>
            <th style="border-right: 1px solid black;width:25%">ผู้ตรวจรับสินค้า/Product Inspector</th>
            <th style="border-right: 1px solid black;width:25%">ผู้รับสินค้าปลายทาง/Consignee</th>
            <th style="width:25%">วันที่พิมพ์/Print Date</th>

        </tr>
    </thead>
    <tbody>
        <tr style="vertical-align:top;">
            <td style="text-align: center;border-right: 1px solid black;">
                <br />
                ลงชื่อ/Signature................................<br />
                วันที่/Date....../....../.........<br />
            </td>
            <td style="text-align: center;border-right: 1px solid black;">
                <br />
                ลงชื่อ/Signature................................<br />
                วันที่/Date....../....../.........<br />
            </td>
            <td style="text-align: center;border-right: 1px solid black;">
                <br />
                ลงชื่อ/Signature................................<br />
                วันที่/Date....../....../.........<br />
            </td>
            <td style="text-align: center;">
                <br />
                {{ date("Y/m/d")}}-{{date("h:i:sa")}} <br />
                {{$charterjob->user->name}}

            </td>

        </tr>
    </tbody>

</table>



@endsection
