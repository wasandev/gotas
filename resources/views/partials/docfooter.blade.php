 <table class="footer" style="border: .1px solid black; border-collapse: collapse;">
        <tr style="vertical-align: buttom;height: 100px;border: 1px solid black;">
            <td style="width=350%;text-align: center;border: 1px solid black;">
                <br/>
                ลงชื่อ/Signature................................<br/>
                                    ผู้ว่าจ้าง/Customer<br/>
                        วันที่/Date....../....../.........<br/>
            </td>
           <td style="width=35%;text-align: center;border: 1px solid black;">
            <br/>
                ลงชื่อ/Signature................................<br/>
                                      ผู้เสนอราคา/Quote by<br/>
                        วันที่/Date....../....../.........<br/>
            </td>
            <td style="width=30%;text-align: center;border: 1px solid black;">
                <br/>
                 วันที่พิมพ์/Print Date: {{ date("Y/m/d")}}-{{date("h:i:sa")}} <br/>
                 ผู้ทำรายการ/Document Issue By  :{{$quotation->user->name}}

            </td>

        </tr>

    </table>
