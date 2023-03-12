@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])


@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Biz Ad') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="{{ route('user.create.card') }}">
                                <button type="button" class="btn btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    {{ __('Create') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12 d-none d-md-block">
                        <div class="card">
                            <div class="table-responsive px-2 py-2">
                                <table class="table table-vcenter card-table" id="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Business ID') }}</th>
                                            <th>{{ __('Business Name') }}</th>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Validity Upto') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Store') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($business_cards) && $business_cards->count())
                                            @foreach ($business_cards as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->card_id }}</td>
                                                    <td>{{ $row->adsname ?? $row->title }}</td>
                                                    <td>{{ $row->card_type == 'vcard' ? __('vCard') : __('WhatsApp Store') }}
                                                    </td>
                                                    <td class="text-muted">
                                                        {{ date('d/M/Y', strtotime($row->plan_validity)) }}</td>
                                                    <td class="text-muted">
                                                        @if ($row->card_status == 'activated')
                                                            <span class="badge bg-green">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="badge bg-red">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($row->is_store_show == 1)
                                                            <a
                                                                href="{{ route('user.card.storestatus', [$row->id, '0']) }}"><i
                                                                    class="fa fa-check"></i> <i class="fa fa-store"></i></a>
                                                        @else
                                                            <a
                                                                href="{{ route('user.card.storestatus', [$row->id, '1']) }}"><i
                                                                    class="fa fa-times"></i> <i class="fa fa-store"></i></a>
                                                        @endif



                                                    </td>

                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="open-qr btn btn-primary btn-sm"
                                                                data-id="{{ $row->card_url }}"
                                                                href="#openQR">{{ __('Scan') }}</a>
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('user.edit.card', $row->card_id) }}">{{ __('Edit') }}</a>

                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('card.preview', $row->card_url) }}"
                                                                target="_blank">{{ __('Preview') }}</a>
                                                            <a class="btn btn-secondary btn-sm"
                                                                href="{{ route('user.card.subscriber', $row->id) }}">{{ __('Subscribers') }}</a>
                                                            <a class="btn btn-danger btn-sm delete-card"
                                                                href="{{ route('user.card.delete', $row->card_id) }}">
                                                                {{ __('Delete') }}
                                                            </a>


                                                            {{--
                                                <a class="btn btn-primary btn-sm" href="{{ URL::to('/')."
                                                    /".$row->card_url }}"
                                                    target="_blank">{{ __('Live') }}</a> --}}
                                                            @if ($row->card_status == 'activated')
                                                                <a class="open-model btn btn-primary btn-sm"
                                                                    data-id="{{ $row->card_id }}"
                                                                    href="#openModel">{{ __('Disable') }}</a>
                                                            @else
                                                                <a class="open-model btn btn-primary btn-sm"
                                                                    data-id="{{ $row->card_id }}"
                                                                    href="#openModel">{{ __('Enable') }}</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ __('No DigitalBizAds Cards Found.') }}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    @if (!empty($business_cards) && $business_cards->count())
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($business_cards as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>{{ $row->adsname ?? $row->title }}</td>
                                                        </h3>
                                                    </div>

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <div class="dropdown text-end">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="open-qr dropdown-item text-info"
                                                                    data-id="{{ $row->card_url }}" href="#openQR">
                                                                    {{ __('Scan') }}
                                                                </a>
                                                                <a class="dropdown-item text-success"
                                                                    href="{{ route('user.edit.card', $row->card_id) }}">{{ __('Edit') }}</a>

                                                                <a class="dropdown-item text-dark"
                                                                    href="{{ route('card.preview', $row->card_url) }}"
                                                                    target="_blank">{{ __('Preview') }}</a>

                                                                <a class="dropdown-item text-dark"
                                                                    href="{{ route('card.preview', $row->card_url) }}"
                                                                    target="_blank">{{ __('Subscribers') }}</a>

                                                                @if ($row->is_store_show == 1)
                                                                    <a class="dropdown-item text-dark"
                                                                        href="{{ route('user.card.storestatus', [$row->id, '0']) }}">Connect
                                                                        Store</a>
                                                                @else
                                                                    <a class="dropdown-item text-dark"
                                                                        href="{{ route('user.card.storestatus', [$row->id, '1']) }}">Disconnect
                                                                        Store</a>
                                                                @endif

                                                                <a class="dropdown-item  text-danger delete-card"
                                                                    href="{{ route('user.card.delete', $row->card_id) }}">
                                                                    {{ __('Delete') }}
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>

    <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will enabled/disabled this card.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="plan_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="openQR" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">{{ __('Scan Biz Ad') }}</div>
                </div>
                <div class="modal-body text-center">
                    <img id="cardURL">
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).on('click', '.delete-card', function(e) {
            var conBox = confirm("Are you sure to delete this ads?");
            if (conBox) {
                return true;
            }
            return false;
        })
    </script>
@endsection
