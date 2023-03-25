<html>

<body
    style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table
        style="border-collapse: collapse; max-width:670px; margin:50px 50px 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
        <thead>
            <tr>
                <th style="text-align:left;"><img style="max-width: 150px;"
                        src="https://www.bachanatours.in/book/img/logo.png" alt="bachana tours"></th>
                <th style="text-align:right;font-weight:400;">{{ $order->order_date }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b
                            style="color:green;font-weight:normal;margin:0">
                            {{ $order->payment_status ? 'Success' : 'Faild' }}
                        </b></p>
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span>
                        {{ $productOrderTransaction->transection_id }}</p>
                    <p style="font-size:14px;margin:0 0 0 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span>
                        {{ getPrice($productOrderTransaction->trsnsection_amount) }}</p>
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>

                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px">Name</span>{{ $shipping['ship_first_name'] . ' ' . $shipping['ship_last_name'] }}
                    </p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Email</span>
                        {{ $shipping['ship_email'] }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Phone</span>
                        {{ $shipping['ship_phone'] }}</p>

                </td>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Address</span>
                        {{ $shipping['ship_address1'] . ' ' . $shipping['ship_city'] . ' ' . $shipping['shipping_states'] . ' ' . $shipping['ship_zip'] . ' ' . $shipping['shipping_area'] }}
                    </p>
                </td>
            </tr>
            <tr>
                <th style="padding:10px; border: solid 1px #ddd;border-collapse: collapse;">Items</th>
                <th style="padding:10px; border: solid 1px #ddd;border-collapse: collapse; text-align:center;">Unit
                    Price
                </th>
                <th style="padding:10px; border: solid 1px #ddd;border-collapse: collapse;">Quantity</th>
                <th style="padding:10px; border: solid 1px #ddd;border-collapse: collapse;">Total</th>
            </tr>
            @php
                $total = 0;
            @endphp
            @foreach ($order->orderDetails as $orderDetails)
                @php
                    $variant = json_decode($orderDetails->variant_id, true);
                    $variantOption = json_decode($orderDetails->variant_option_id, true);
                    $total += $orderDetails->unit_price * $orderDetails->quantity;
                    $line_total = $orderDetails->unit_price * $orderDetails->quantity;
                @endphp
                <tr style="border: solid 1px #ddd;">
                    <td style="border: solid 1px #ddd;border-collapse: collapse;">
                        <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                            <span
                                style="display:block;font-size:13px;font-weight:normal;">{{ $orderDetails->hasProduct->product_name }}</span>
                        </p>

                    </td>

                    <td style="border: solid 1px #ddd;border-collapse: collapse;">
                        <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;text-align:center; ">
                            <span
                                style="display:block;font-size:13px;font-weight:normal;">{{ getPrice($orderDetails->unit_price) }}</span>
                        </p>
                    </td>
                    <td style="border: solid 1px #ddd;border-collapse: collapse;">
                        <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                            <span
                                style="display:block;font-size:13px;font-weight:normal;">{{ $orderDetails->quantity }}</span>
                        </p>
                    </td>
                    <td style="border: solid 1px #ddd;border-collapse: collapse;">

                        <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                            <span style="display:block;font-size:13px;font-weight:normal;">{{ $line_total }}</span>
                        </p>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td style="border: solid 1px #ddd;border-collapse: collapse;" colspan="3">
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold; text-align:right">Shiping Cost :
                    </p>
                </td>
                <td style="border: solid 1px #ddd;border-collapse: collapse;">
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                        <span
                            style="display:block;font-size:13px;font-weight:normal;">{{ $order->shipping_cost }}</span>
                    </p>
                </td>

            </tr>
            <tr>
                <td style="border: solid 1px #ddd;border-collapse: collapse;" colspan="3">
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold; text-align:right">Vat :
                    </p>
                </td>
                <td style="border: solid 1px #ddd;border-collapse: collapse;">
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">{{ $order->vat }}</span>
                    </p>
                </td>

            </tr>
            <tr>
                <td style="border: solid 1px #ddd;border-collapse: collapse;" colspan="3">
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold; text-align:right">Grand Total :</p>
                </td>
                <td style="border: solid 1px #ddd;border-collapse: collapse;">
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                        <span
                            style="display:block;font-size:13px;font-weight:normal;">{{ $total + $order->shipping_cost + $order->vat }}</span>
                    </p>
                </td>

            </tr>
        </tbody>

    </table>
</body>

</html>
