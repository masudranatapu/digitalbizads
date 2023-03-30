@extends('pages.product.layouts.master')
@section('title', 'Invoice')

@push('css')
    <link href="{{ asset('assets/css/print.min.css') }}" rel="stylesheet">
    <style>
        @media print {
            .card {
                --tblr-card-border-radius: 4px;
                box-shadow: rgba(30, 41, 59, 0.04) 0 2px 4px 0;
                border: 1px solid rgba(98, 105, 118, 0.16);
                background: var(--tblr-card-bg, #fff);
                border-radius: var(--tblr-card-border-radius);
                transition: transform 0.3s ease-out, opacity 0.3s ease-out, box-shadow 0.3s ease-out;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">

                            <button class="btn btn btn-primary" type="button" onclick="printPdf()">
                                <i class="fas fa-print"></i>&nbsp;
                                {{ __('Print') }}
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body my-2">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12 d-none d-md-block">

                        <div class="page-body">

                            <div class="card card-lg rounded-0">
                                <div id="invoice">
                                    <div class="card-body">

                                        <div class="row">
                                            @php
                                                
                                                $billing = json_decode($orders->billing_details, true);
                                            @endphp
                                            <div class="col-6">
                                                <address>

                                                    <h4>Shipping</h4>
                                                    <p><strong>Name :
                                                        </strong><span>{{ $shipping['ship_first_name'] . ' ' . $shipping['ship_last_name'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Email :
                                                        </strong><span>{{ $shipping['ship_email'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Phone :
                                                        </strong><span>{{ $shipping['ship_phone'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Address :
                                                        </strong><span>{{ $shipping['ship_address1'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>City :
                                                        </strong><span>{{ $shipping['ship_city'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>State :
                                                        </strong><span>{{ $shipping['shipping_states'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Zip :
                                                        </strong><span>{{ $shipping['ship_zip'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Area :
                                                        </strong><span>{{ $shipping['shipping_area'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    {{-- <p><strong>Note :
                                                        </strong><span>{{ $shipping['order_note'] ?? 'Not Available' }}</span>
                                                    </p> --}}

                                                </address>
                                            </div>
                                            <div class="col-6">
                                                <address class="text-end">
                                                    <h4>Billiing</h4>

                                                    <p><strong>Name:
                                                        </strong><span>{{ $billing['bill_first_name'] . ' ' . $billing['bill_last_name'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Email:
                                                        </strong><span>{{ $billing['bill_email'] ?? 'Not Available' }}</span>
                                                    </p>
                                                    <p><strong>Phone:
                                                        </strong><span>{{ $billing['bill_phone'] ?? 'Not Available' }}</span>
                                                    </p>
                                                    <p><strong>Address:
                                                        </strong><span>{{ $billing['bill_address1'] ?? 'Not Available' }}</span>
                                                    </p>
                                                    <p><strong>City:
                                                        </strong><span>{{ $billing['bill_city'] ?? 'Not Available' }}</span>
                                                    </p>
                                                    <p><strong>State:
                                                        </strong><span>{{ $billing['bill_state'] ?? 'Not Available' }}</span>
                                                    </p>
                                                    <p><strong>Zip:
                                                        </strong><span>{{ $billing['bill_zip'] ?? 'Not Available' }}</span>
                                                    </p>

                                                    <p><strong>Order Date :
                                                        </strong><span>{{ date('d-M-Y', strtotime($orders->order_date)) }}</span>
                                                    </p>
                                                    <p class="text-end"><strong>Order Number:</strong>
                                                        <span>{{ $orders->order_number }}</span>
                                                    </p>

                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product & Variant</th>
                                                    <th class="text-end">Unit Price</th>
                                                    <th class="text-end">Quantity</th>
                                                    <th class="text-end">Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($orders->orderDetails as $orderDetails)
                                                    @php
                                                        $variant = json_decode($orderDetails->variant_id, true);
                                                        $variantOption = json_decode($orderDetails->variant_option_id, true);
                                                        
                                                    @endphp
                                                    <tr>
                                                        <td class="d-flex justify-content-between">
                                                            <p>{{ $orderDetails->hasProduct->product_name }}</p>
                                                            @if (isset($orderDetails->variant_id))
                                                                <p class="m-0">
                                                                    @for ($i = 0; $i < count($variant); $i++)
                                                                        <strong>{{ $variant[$i]['name'] }}
                                                                            :</strong>
                                                                        <span>{{ $variantOption[$i]['name'] }}</span>
                                                                        <br>
                                                                    @endfor
                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td class="text-end">
                                                            {{ getPrice($orderDetails->unit_price) }}
                                                        </td>
                                                        <td class="text-end">
                                                            {{ $orderDetails->quantity }}
                                                        </td>
                                                        <td class="text-end">
                                                            {{ getPrice($orderDetails->unit_price * $orderDetails->quantity) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr class="text-end">
                                                    <th colspan="3">Total :</th>
                                                    <td>{{ getPrice($orders->total_price) }}</td>
                                                </tr>
                                                <tr class="text-end">
                                                    <th colspan="3">Shipping Cost :</th>
                                                    <td>{{ getPrice($orders->shipping_cost) }}</td>
                                                </tr>
                                                <tr class="text-end">
                                                    <th colspan="3">Vat :</th>
                                                    <td>{{ getPrice($orders->vat) }}</td>
                                                </tr>
                                                <tr class="text-end">
                                                    <th colspan="3">Discount :</th>
                                                    <td>-{{ getPrice($orders->discount ?? 0) }}</td>
                                                </tr>
                                                <tr class="text-end">
                                                    <th colspan="3">Grand Total :</th>
                                                    <td>{{ getPrice($orders->grand_total) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @php
                                            
                                            $shipping = json_decode($orders->shipping_details, true);
                                            $billing = json_decode($orders->billing_details, true);
                                        @endphp

                                        <div class="col-12">
                                            <address>

                                                <h2>Shipping</h2>
                                                <p><strong>Name :
                                                    </strong><span>{{ $shipping['ship_first_name'] . ' ' . $shipping['ship_last_name'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Email :
                                                    </strong><span>{{ $shipping['ship_email'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Phone :
                                                    </strong><span>{{ $shipping['ship_phone'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Address :
                                                    </strong><span>{{ $shipping['ship_address1'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>City :
                                                    </strong><span>{{ $shipping['ship_city'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>State :
                                                    </strong><span>{{ $shipping['ship_states'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Zip :
                                                    </strong><span>{{ $shipping['ship_zip'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Area :
                                                    </strong><span>{{ $shipping['shipping_area'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Note :
                                                    </strong><span>{{ $shipping['order_note'] ?? 'Not Available' }}</span>
                                                </p>

                                            </address>
                                        </div>
                                        <hr>
                                        <div class="col-12">
                                            <address>
                                                <h2>Billiing</h2>

                                                <p><strong>Name:
                                                    </strong><span>{{ $billing['bill_first_name'] . ' ' . $billing['bill_last_name'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Email:
                                                    </strong><span>{{ $billing['bill_email'] ?? 'Not Available' }}</span>
                                                </p>
                                                <p><strong>Phone:
                                                    </strong><span>{{ $billing['bill_phone'] ?? 'Not Available' }}</span>
                                                </p>
                                                <p><strong>Address:
                                                    </strong><span>{{ $billing['bill_address1'] ?? 'Not Available' }}</span>
                                                </p>
                                                <p><strong>City:
                                                    </strong><span>{{ $billing['bill_city'] ?? 'Not Available' }}</span>
                                                </p>
                                                <p><strong>State:
                                                    </strong><span>{{ $billing['bill_state'] ?? 'Not Available' }}</span>
                                                </p>
                                                <p><strong>Zip:
                                                    </strong><span>{{ $billing['bill_zip'] ?? 'Not Available' }}</span>
                                                </p>

                                                <p><strong>Order Date :
                                                    </strong><span>{{ date('d-M-Y', strtotime($orders->order_date)) }}</span>
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product & Variant</th>
                                                <th class="text-end">Unit Price</th>
                                                <th class="text-end">Quantity</th>
                                                <th class="text-end">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($orders->orderDetails as $orderDetails)
                                                @php
                                                    $variant = json_decode($orderDetails->variant_id, true);
                                                    $variantOption = json_decode($orderDetails->variant_option_id, true);
                                                    
                                                @endphp
                                                <tr>
                                                    <td class="d-flex justify-content-between">
                                                        <p>{{ $orderDetails->hasProduct->product_name }}</p>
                                                        @if (isset($orderDetails->variant_id))
                                                            <p class="m-0">
                                                                @for ($i = 0; $i < count($variant); $i++)
                                                                    <strong>{{ $variant[$i]['name'] }}
                                                                        :</strong>
                                                                    <span>{{ $variantOption[$i]['name'] }}</span>
                                                                    <br>
                                                                @endfor
                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        {{ getPrice($orderDetails->unit_price) }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $orderDetails->quantity }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ getPrice($orderDetails->unit_price * $orderDetails->quantity) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="text-end">
                                                <th colspan="3">Total :</th>
                                                <td>{{ getPrice($orders->total_price) }}</td>
                                            </tr>
                                            <tr class="text-end">
                                                <th colspan="3">Shipping Cost :</th>
                                                <td>{{ getPrice($orders->shipping_cost) }}</td>
                                            </tr>
                                            <tr class="text-end">
                                                <th colspan="3">Vat :</th>
                                                <td>{{ getPrice($orders->vat) }}</td>
                                            </tr>
                                            <tr class="text-end">
                                                <th colspan="3">Discount :</th>
                                                <td>-{{ getPrice($orders->discount ?? 0) }}</td>
                                            </tr>
                                            <tr class="text-end">
                                                <th colspan="3">Grand Total :</th>
                                                <td>{{ getPrice($orders->total_price) }}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('assets/js/print.min.js') }}"></script>
    <script>
        function printPdf() {

            printJS({
                printable: 'invoice',
                type: 'html',
                targetStyles: ['*'],
                maxWidth: 1470,

            })

        }
    </script>

    @if (isset($status) && $status)
        @php
            $store_description = json_decode($business_card_details->description, true);
            
        @endphp
        @if (isset($store_description['whatsapp_no']))
            <script>
                $(document).ready(function() {

                    let whatsAppNumber = "{{ $store_description['whatsapp_no'] }}";

                    let invoiceLink =
                        "{{ route('payment.invoice', ['cardUrl' => $business_card_details->card_url, 'orderid' => $orders->order_number]) }}";

                    let userName = "{{ $shipping['ship_first_name'] . ' ' . $shipping['ship_last_name'] }}"

                    let waShareContent = "You got a new order from " + userName + ".Check Order " + invoiceLink;

                    var link = "https://api.whatsapp.com/send/?phone=" + whatsAppNumber + "&text=" + encodeURI(
                        waShareContent);
                    window.open(link, '_blank');
                })
            </script>
        @endif
    @endif
@endpush
