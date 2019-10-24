<table class="footer" style="border: .1px solid black; border-collapse: collapse;">
    <tr style="vertical-align: buttom;height: 100px;border: 1px solid black;">
        <td style="width=25%;text-align: center;border: 1px solid black;">
            <br />
            ลงชื่อ/Signature................................<br />
            ผู้ว่าจ้าง/Customer<br />
            วันที่/Date....../....../.........<br />
        </td>
        <td style="width=25%;text-align: center;border: 1px solid black;">
            <br />
            ลงชื่อ/Signature................................<br />
            ผู้ตรวจรับสินค้า/Product Inspector<br />
            {{$charterjob->employee->name}}
            วันที่/Date....../....../.........<br />
        </td>
        <td style="width=25%;text-align: center;border: 1px solid black;">
            <br />
            ลงชื่อ/Signature................................<br />
            ผู้รับสินค้าปลายทาง/Consignee<br />
            วันที่/Date....../....../.........<br />
        </td>
        <td style="width=25%;text-align: center;border: 1px solid black;">
            <br />
            วันที่พิมพ์/Print Date: {{ date("Y/m/d")}}-{{date("h:i:sa")}} <br />
            ผู้ทำรายการ/Document Issue By :{{$charterjob->user->name}}

        </td>

    </tr>

</table>
