<table>
    <tr>
        <td>
            <img src="{{ url('storage/'.$company->logofile) }}" alt="logo">
        </td>
        <td>
            <strong>{{ $company->company_name }}</strong><br />
            สำนักงานใหญ่
            {{ $company->address .' '.$company->sub_district.' '.$company->district.' ' .$company->province.' '.$company->postal_code }}<br />
            โทรศัพท์ {{$company->phoneno}} อีเมล : {{$company->email}} เลขประตัวผู้เสียภาษีอากร {{ $company->taxid}}



        </td>
    </tr>



</table>
