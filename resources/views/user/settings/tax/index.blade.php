@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('setting-nav', 'active')

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
                            {{ __('Tax Setting') }}
                        </h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">

                            <a type="button" href="{{ route('user.state.create') }}">
                                <button class="btn btn btn-primary" type="button">
                                    <i class="fas fa-plus-circle fa-1x"></i> &ensp;
                                    {{ __('Add State Tax') }}
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
                                            <th>{{ __('State') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($states) && $states->count())
                                            @foreach ($states as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>
                                                        @if ($row->tax_type == 'percentage')
                                                            {{ $row->amount . '%' }}
                                                        @elseif ($row->tax_type == 'amount')
                                                            {{ '$' . $row->amount }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($row->status)
                                                            <span class="badge bg-green">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Dective</span>
                                                        @endif

                                                    </td>

                                                    <td>
                                                        <div class="btn-list flex-nowrap">

                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('user.state.edit', ['id' => $row->id]) }}">
                                                                {{ __('Edit') }}
                                                            </a>
                                                            @if ($row->status)
                                                                <a class="btn btn-danger btn-sm"
                                                                    data-url="{{ route('user.state.status', $row->id) }}"
                                                                    data-status="{{ $row->status }}"
                                                                    href="javascripy:void(0)" onclick="deactiveState(this)">
                                                                    {{ __('Deactive') }}
                                                                </a>
                                                            @else
                                                                <a class="btn btn-success btn-sm"
                                                                    data-url="{{ route('user.state.status', $row->id) }}"
                                                                    data-status="{{ $row->status }}"
                                                                    href="javascript:void(0)" onclick="deactiveState(this)">
                                                                    {{ __('Active') }}
                                                                </a>
                                                            @endif

                                                            <a class="btn btn-danger btn-sm"
                                                                data-url="{{ route('user.state.delete', $row->id) }}"
                                                                href="javascript:void(0)" onclick="deleteState(this)">
                                                                {{ __('Delete') }}
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">
                                                <td class="text-center text-danger" colspan="5">
                                                    {{ __('No state tax found.') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if (!empty($states) && $states->count())
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($states as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>{{ $row->name }}</td>
                                                        </h3>
                                                    </div>

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <div class="dropdown text-end">
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" type="button"
                                                                aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">

                                                                <a class="dropdown-item"
                                                                    href="{{ route('user.state.edit', ['id' => $row->id]) }}">
                                                                    {{ __('Edit') }}
                                                                </a>
                                                                @if ($row->status)
                                                                    <a class="dropdown-item"
                                                                        data-url="{{ route('user.state.status', $row->id) }}"
                                                                        data-status="{{ $row->status }}"
                                                                        href="javascripy:void(0)"
                                                                        onclick="deactiveState(this)">
                                                                        {{ __('Deactive') }}
                                                                    </a>
                                                                @else
                                                                    <a class="dropdown-item"
                                                                        data-url="{{ route('user.state.status', $row->id) }}"
                                                                        data-status="{{ $row->status }}"
                                                                        href="javascript:void(0)"
                                                                        onclick="deactiveState(this)">
                                                                        {{ __('Active') }}
                                                                    </a>
                                                                @endif

                                                                <a class="dropdown-item"
                                                                    data-url="{{ route('user.state.delete', $row->id) }}"
                                                                    href="javascript:void(0)" onclick="deleteState(this)">
                                                                    {{ __('Delete') }}
                                                                </a>

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
    </div>
    @include('user.includes.footer')
    </div>

    <div class="modal modal-blur fade" id="sendEmailModal" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <form action="{{ route('user.card.subscriber.send.mail') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Send email to subscriber') }}</div>
                        <div class="form-group">
                            <label class=" form-label" for="email">Email</label>
                            <input class="form-control" id="senderEmail" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <label class=" form-label" for="subject">Subject</label>
                            <input class="form-control" id="sendersubject" name="subject" type="subject" required>
                        </div>
                        <div class="form-group">
                            <label class=" form-label" for="message">Message</label>
                            <textarea class="form-control" id="senderMessage" name="message" required cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal"
                            type="button">{{ __('Cancel') }}</button>
                        <button class="btn btn-danger" id="plan_id" type="submit">{{ __('Send') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal modal-blur fade show" id="deleteModal" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">
                        {{ __('Are you sure?') }}</div>
                    <div>
                        {{ __('If you proceed, you will delete this product.') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal"
                        type="button">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="product_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="deactiveModal" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div id="statusMessage"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal"
                        type="button">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="state_id_status">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        function deleteState(event) {
            const {
                url
            } = event.dataset;
            console.log(url);
            $('#deleteModal').modal('show');
            $('#product_id').prop('href', url);


        }

        function deactiveState(event) {
            const {
                url,
                status
            } = event.dataset;
            $('#deactiveModal').modal('show');
            if (status) {
                $('#statusMessage').html("If you proceed, you will deactive this state tax.");

            } else {

                $('#statusMessage').html("If you proceed, you will active this state tax.");
            }

            $('#state_id_status').prop('href', url);

        }
    </script>
@endpush
