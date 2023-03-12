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

                            <a type="button" class="btn btn-primary" href="{{ route('user.setting.tax.create') }}">

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
                                                                href="{{ route('user.setting.tax.edit', ['state' => $row->id]) }}">
                                                                {{ __('Edit') }}
                                                            </a>
                                                            @if ($row->status)
                                                                <a class="btn btn-danger btn-sm" href="javascripy:void(0)"
                                                                    data-id="{{ $row->id }}"
                                                                    data-status="{{ $row->status }}"
                                                                    onclick="deactiveState(this)">
                                                                    {{ __('Deactive') }}
                                                                </a>
                                                            @else
                                                                <a class="btn btn-success btn-sm" href="javascript:void(0)"
                                                                    data-id="{{ $row->id }}"
                                                                    data-status="{{ $row->status }}"
                                                                    onclick="deactiveState(this)">
                                                                    {{ __('Active') }}
                                                                </a>
                                                            @endif

                                                            <a class="btn btn-danger btn-sm" data-id="{{ $row->id }}"
                                                                href="javascript:void(0)" onclick="deleteState(this)">
                                                                {{ __('Delete') }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">
                                                <td colspan="5" class="text-center text-danger">
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
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">


                                                                <a class="dropdown-item  text-danger delete-card"
                                                                    href="javascript:void(0)">
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
    <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will delete this state.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="state_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="deactiveModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div id="statusMessage"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="state_id_status">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteState(event) {
            const {
                id
            } = event.dataset;
            $('#deleteModal').modal('show');
            $('#state_id').prop('href', "{{ route('user.setting.tax') }}/delete/" + id)


        }

        function deactiveState(event) {
            const {
                id,
                status
            } = event.dataset;
            $('#deactiveModal').modal('show');
            if (status) {
                $('#statusMessage').html("If you proceed, you will deactive this state tax.");

            } else {

                $('#statusMessage').html("If you proceed, you will active this state tax.");
            }

            $('#state_id_status').prop('href', "{{ route('user.setting.tax') }}/status/" + id)


        }
    </script>
@endsection
