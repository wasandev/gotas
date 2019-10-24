<table>
    <tr style="vertical-align: top;">
        <td>
            <img src="{{ url('storage/'.$company->logofile) }}" alt="logo">
        </td>
        <td>
            <strong>{{ $company->company_name }}</strong><br />
            สำนักงานใหญ่
            {{ $company->address .' '.$company->sub_district.' '.$company->district.' ' .$company->province.' '.$company->postal_code }}<br />
            โทรศัพท์ {{$company->phoneno}} อีเมล : {{$company->email}} เลขประตัวผู้เสียภาษีอากร {{ $company->taxid}}

        </td>
        <td style="vertical-align: top;text-align: center;font-size: 1.2em;">
            <p style="border: 1px solid black;border-radius: 5px;">
                <strong>ใบงานขนส่งเหมาคัน</strong>
                <br />FREIGHT BILL
            </p>


        </td>
    </tr>



</table>
