<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if (trim($__env->yieldContent('template_title')))@yield('template_title') |
        @endif {{ trans('installer_messages.title') }}
    </title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" sizes="96x96" />

    <!-- CSS files -->
    <link href="{{ asset('backend/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
    </script>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">



    <div class="page page-center">
        <div class="container-tight py-4">


            <div class="card card-md">
                <div class="card-body text-center">
                    <div class="text-center mb-1">
                        <a href="#"><img src="{{ asset('logo.png') }}" height="36" alt=""></a>
                    </div>

                    <div class="hr-text hr-text-center mb-0 mt-4 hr-text-spaceless">@yield('title')</div>

                </div>


                <div class="m-3">

                    @if (session('message'))
                        <div class="alert alert-info">
                            <strong>
                                @if (is_array(session('message')))
                                    {{ session('message')['message'] }}
                                @else
                                    {{ session('message') }}
                                @endif
                            </strong>
                        </div>
                    @endif
                    @if (session()->has('errors'))
                        <div class="alert alert-danger">
                            <h4>
                                {{ trans('installer_messages.forms.errorTitle') }}
                            </h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>



                <div class="align-items-center">
                    <div class="col-12">



                        <div class="card-body">


                            @yield('container')


                        </div>

                        <div class="hr-text hr-text-center mb-4 mt-4 hr-text-spaceless">Installation Progress</div>

                        <div class="row item-align-center">

                            <div class="col-3">&nbsp;</div>
                            <div class="col-6 pb-4 pt-4">

                                <div class="progress">

                                    @if (Request::is('install'))
                                        <div class="progress-bar" style="width: 0%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">0% Complete</span>
                                        </div>
                                    @endif

                                    @if (Request::is('install/requirements'))
                                        <div class="progress-bar" style="width: 10%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">10% Complete</span>
                                        </div>

                                    @endif


                                    @if (Request::is('install/permissions'))
                                        <div class="progress-bar" style="width: 20%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">20% Complete</span>
                                        </div>

                                    @endif


                                    @if (Request::is('install/environment'))
                                        <div class="progress-bar" style="width: 40%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">40% Complete</span>
                                        </div>

                                    @endif


                                    @if (Request::is('install/environment/wizard') || Request::is('install/environment/classic'))
                                        <div class="progress-bar" style="width: 70%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">70% Complete</span>
                                        </div>

                                    @endif

                                    @if (Request::is('install/final'))
                                        <div class="progress-bar" style="width: 100%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">100% Complete</span>
                                        </div>

                                    @endif

                                </div>
                            </div>
                            <div class="col-3">&nbsp;</div>


                        </div>



                    </div>


                </div>
            </div>
        </div>



    </div>






    @yield('scripts')
    <script type="text/javascript">
        var x = document.getElementById('error_alert');
        var y = document.getElementById('close_alert');
        y.onclick = function() {
            x.style.display = "none";
        };
    </script>
</body>

</html>
