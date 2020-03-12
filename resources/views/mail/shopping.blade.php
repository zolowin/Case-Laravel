<base href="{{ asset('') }}">
<div marginheight="0" marginwidth="0" style="background:#f0f0f0">
    <div id="wrapper" style="background-color:#f0f0f0">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px!important;min-width:600px!important" class="container">
            <tbody>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="middle" style="width:500px;height:60px">
                                <a href="#" style="border:0" target="_blank" width="130" height="35" style="display:block;border:0px">
                                    <img src="{{ asset('img/logo.png') }}" height="100" width="115" style="display:block;border:0px;float: left;"> <b style="float: left;line-height: 100px;color: red;font-size: 20px;">Anh Tan Mobile</b>
                                </a>
                            </td>
                            <td align="right" valign="middle" style="padding-right:15px">
                                <a href="" style="border:0">
                                    <img src="https://i.imgur.com/eL1uAJx.png" height="36" width="115" style="display:block;border:0px">
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                Thông báo đặt hàng thành công
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">
                                Chào {{ $transaction->tr_user_name }},
                                <br> Cám ơn bạn đã mua sắm tại Anh Tan Mobile
                                <br>
                                <br> Đơn hàng của bạn đang
                                <b>chờ shop</b>
                                <b>xác nhận</b> (trong vòng 24h)
                                <br> Chúng tôi sẽ thông tin <b>trạng thái đơn hàng</b> trong email tiếp theo.
                                <br> Bạn vui lòng kiểm tra email thường xuyên nhé.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td colspan="2" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px">
                                <b>Đơn hàng của bạn </b>
                                <a href="#" style="color:#ed2324;font-weight:bold;text-decoration:none" target="_blank">TR{{ $transaction->tr_user_id . $transaction->id }}
                                </a>
                                <span style="font-size:12px">({{ $transaction->created_at }})</span>
                            </td>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td align="left" valign="top" style="width:120px;padding-left:15px">
                                <a href="#_" style="border:0">
                                    <img src="{{ 'data:image/jpeg;base64,'.$order->product->product_image }}" height="120" width="120" style="display:block;border:0px">
                                </a>
                            </td>
                            <td align="left" valign="top">
                                <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                    <tr>
                                        <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                            <b>Sản phẩm</b>
                                        </td>
                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                            <a href="{{ route('page.show_product', $order->product->product_slug) }}" style="color:#115fff;text-decoration:none" target="_blank">
                                                {{ $order->product->product_name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                            <b>Giá</b>
                                        </td>
                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                            ${{ number_format($order->or_price, 0, ',', ' ') }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                <b>Tổng Giá Tiền</b>
                            </td>
                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                ${{ number_format($transaction->tr_total_price, 0, ',', ' ') }}
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                <b>Người nhận</b>
                            </td>
                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                <b>{{ $transaction->tr_user_name }}</b>
                                <br>
                                {{ $transaction->tr_address }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                    <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này.
                                <br> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng ghé thăm
                                <b style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">Trung tâm trợ giúp</b> của chúng tôi tại địa chỉ:
                                <a href="https://www.facebook.com/c9hai1" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold" target="_blank">
                                    https://www.facebook.com/c9hai1
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
