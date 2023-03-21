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
                            {{ __('Biz Ad Subscribers') }}
                        </h2>
                    </div>
                    @if (!empty($subscriber) && $subscriber->count())
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="dropdown">

                                <a href="{{ route('user.card.subscriber.export', ['card' => $cardId]) }}">
                                    <button type="button" class="btn btn btn-primary">
                                        <i class="fas fa-file-excel"></i> &ensp;
                                        {{ __('Export To Excel') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endif

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
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Subscribetion Date') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($subscriber) && $subscriber->count())
                                            @foreach ($subscriber as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ date('d-M-Y', strtotime($row->created_at)) }}</td>



                                                    <td>
                                                        <div class="btn-list flex-nowrap">


                                                            <a class="btn btn-danger btn-sm" onclick="sendEmail(this)"
                                                                data-email="{{ $row->email }}" href="javascript:void(0)">
                                                                {{ __('Send Mail') }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">


                                                <td colspan="3" class="text-center text-danger">
                                                    {{ __('No Subscriber Found.') }}</td>


                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    @if (!empty($subscriber) && $subscriber->count())
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($subscriber as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>{{ $row->email }}</td>
                                                        </h3>
                                                    </div>

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <div class="dropdown text-end">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">


                                                                <a class="dropdown-item  text-danger delete-card"
                                                                    href="javascript:void(0)" onclick="sendEmail(this);"
                                                                    data-email="{{ $row->email }}">
                                                                    {{ __('Send Mail') }}
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

    <div class="modal modal-blur fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <form action="{{ route('user.card.subscriber.send.mail') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Send email to subscriber') }}</div>
                        <div class="form-group">
                            <label for="email" class=" form-label">Email</label>
                            <input type="email" id="senderEmail" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subject" class=" form-label">Subject</label>
                            <input type="subject" id="sendersubject" name="subject" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message" class=" form-label">Message</label>
                            <textarea id="senderMessage" name="message" required class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger" id="plan_id">{{ __('Send') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@push('custom-js')

<script>
    function sendEmail(event) {
        const {
            email
        } =
        event.dataset;

        $('#sendersubject').val('');
        $('#senderMessage').val('');
        $('#senderEmail').val(email);

        $('#sendEmailModal').modal('show');




    }
</script>

@endpush
