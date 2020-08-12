<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unimart</title>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" width="600" style="margin-top:15px">
        <tbody>

            <tr style="background:#fff">
                <td align="left" width="600" height="auto" style="padding:15px">
                    <table>
                        <tbody>
                            <tr>

                                <td>
                                    <h1 style="font-size:14px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Đơn hàng {{ session('id_order')}}  đã sẵn sàng để giao đến quý khách {{$fullname}} !

                                    </h1>


                                    <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                        Chúng tôi vừa bàn giao đơn hàng của quý khách đến đối tác vận chuyển Unimart. Dự kiến giao hàng vào {{$datetime}} -&gt;  {{$datetimes}}
                                    </p>

                                    <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                        Để kiểm tra thời gian giao hàng của đối tác Unismart, quý khách vui lòng <a style="color:#00a3dd;text-decoration:underline" href="" target="_blank" data-saferedirecturl=""><strong>Xem tại đây</strong></a>.
                                    </p>

                                    <div style="margin:auto">
                                        <a href="" style="display:inline-block;text-decoration:none;background-color:#00b7f1!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:35%;margin-top:5px" target="_blank" data-saferedirecturl="">Kiểm tra trạng thái đơn hàng</a>
                                    </div>

                                    <h3 style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">Thông tin đơn hàng {{ session('id_order')}} <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">( {{$datetimess}})</span> </h3>
                                </td>


                            </tr>

                            <tr>
                            </tr>
                            <tr>
                                <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th align="left" width="50%" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold">Thông tin thanh toán</th>
                                                <th align="left" width="50%" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold">Địa chỉ giao hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td valign="top" style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">

                                                    <span style="text-transform:capitalize">{{$fullname}}</span><br>

                                                    <a href="mailto:thuyhuong92@gmail.com" target="_blank">{{$email}}</a><br> {{$phone_number}}

                                                </td>

                                                <td valign="top" style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    {{$fullname}}<br>{{$address}}<br> T: {{$phone_number}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td valign="top" style="padding:7px 9px 0px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" colspan="2">
                                                    <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:normal">
                                                        <br>
                                                        <strong>Phí vận chuyển: </strong>Miễn phí ship

                                                        <br>
                                                        <strong>Phương thức thanh toán: </strong>{{$ship_info}}
                                                        <br><strong>Xuất hóa đơn đỏ: </strong>{{$fullname}} <br> ------- <br> {{$address}}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea">CHI TIẾT ĐƠN HÀNG</h2>
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="background:#f5f5f5">
                                        <thead>
                                            <tr>
                                                <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Sản phẩm</th>
                                                <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px"> Đơn giá</th>
                                                <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Số lượng</th>
                                                <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Giảm giá</th>
                                                <th align="right" bgcolor="#02acea" style="padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Tổng tạm</th>
                                            </tr>
                                        </thead>

                                        <tbody bgcolor="#eee" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                            @foreach (Cart::content() as $row)
                                            <tr>
                                                <td align="left" valign="top" style="padding:3px 9px">
                                                    <strong>{{$row->name}}</strong>
                                                </td>
                                                <td align="left" valign="top" style="padding:3px 9px"><span>{{number_format($row->price,0,'','.')}}đ</span></td>
                                                <td align="left" valign="top" style="padding:3px 9px">{{$row->qty}}</td>
                                                <td align="left" valign="top" style="padding:3px 9px"><span>0,00&nbsp;₫</span></td>
                                                <td align="right" valign="top" style="padding:3px 9px">
                                                    <span>{{number_format($row->total,0,'','.')}}đ</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>

                                        <tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                            <tr>
                                                <td colspan="4" align="right" style="padding:5px 9px">Tổng giá trị sản phẩm chưa giảm</td>
                                                <td align="right" style="padding:5px 9px"><span>{{Cart::total()}}đ</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right" style="padding:5px 9px">Chi phí vận chuyển</td>
                                                <td align="right" style="padding:5px 9px"><span>Miễn phí ship</span></td>
                                            </tr>
                                            
                                            <tr bgcolor="#eee">
                                                <td colspan="4" align="right" style="padding:7px 9px"><strong><big>Tổng giá trị đơn hàng</big></strong></td>
                                                <td align="right" style="padding:7px 9px"><strong><big><span>{{Cart::total()}}đ</span></big></strong></td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                        Qúy khách có thể kiểm tra ngoại quan sản phẩm (nhãn hiệu, mẫu mã, màu sắc, số lượng, ...) trước khi thanh toán và có thể từ chối nhận hàng nếu không ưng ý. Vui lòng không kích hoạt các thiết bị điện máy-điện tử hoặc dùng thử sản phẩm.
                                    </p>
                                    <br>
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                        Nếu sản phẩm có dấu hiệu hư hỏng/ bể vỡ hoặc không đúng với thông tin trên website, bạn vui lòng liên hệ với <span class="il">Unismart</span> trong vòng 48 giờ kể từ thời điểm nhận hàng để được hỗ trợ.
                                    </p>
                                    <br>
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                        Qúy khách vui lòng giữ lại hóa đơn, hộp sản phẩm và phiếu bảo hành (nếu có) để đổi trả hàng hoặc bảo hành khi cần thiết.
                                    </p>



                                    <p style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                        Bạn có thể tham khảo thêm tại trang <a href="" target="_blank" data-saferedirecturl="">Trung tâm hỗ trợ</a> hoặc liên hệ với <span class="il">Unismart</span> bằng cách để lại tin nhắn tại trang <a href="" target="_blank" data-saferedirecturl="">Liên hệ</a> hoặc gửi thư đến <a href="mailto:hotro@tiki.vn" target="_blank">đây</a>. Hotline <strong style="color:#099202">1900 6035</strong> (8-21h cả T7,CN).
                                    </p>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <br>
                                    <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">
                                        <span class="il">Unismart</span>.vn cảm ơn quý khách,<br>

                                    </p>
                                    <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right">

                                        <strong><a style="color:#00a3dd;text-decoration:none;font-size:14px" href=""><span class="il">Unismart</span>.vn</a></strong><br>

                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="600">
        <tbody>
            <tr>
                <td>
                    <p style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal" align="left">
                        Quý khách nhận được email này vì đã mua hàng tại <span class="il">Unismart</span>.vn.<br> Để chắc chắn luôn nhận được email thông báo, xác nhận mua hàng từ <span class="il">Unismart</span>.vn, quý khách vui lòng thêm địa chỉ <strong><a href="mailto:noreply@tiki.vn" target="_blank">noreply@<span class="il">Unismart</span>.vn</a></strong> vào số địa chỉ (Address Book, Contacts) của hộp email. <br>
                        <b>Văn phòng <span class="il">Unismart</span>.vn:</b> 52 Út Tịch, Phường 4, Quận Tân Bình, Thành phố Hồ Chí Minh, Việt Nam
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>