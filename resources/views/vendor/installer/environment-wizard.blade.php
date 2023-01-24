<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ __('KreativeWorks Installer') }}
    </title>
    <link rel="icon" type="image/png" href="../../installer/img/favicon/favicon-96x96.png" sizes="96x96" />

    <!-- CSS files -->
    <link href="../../backend/css/tabler.min.css" rel="stylesheet" />
    <link href="../../backend/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="../../backend/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="../../backend/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="../../backendcss/demo.min.css" rel="stylesheet" />
    <link href="../../backendcss/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../backend/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../backend/css/custom.css">
    <script type="text/javascript" src="../../backend/js/jquery.min.js"></script>
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
                        <a href="#"><img src="../../installer/img/logo.png" height="36" alt=""></a>
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
                            <div class="tabs tabs-full">



                                <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}"
                                    class="tabs-wrap">
                                    <div class="tab" id="tab1content">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <div
                                            class="form-group {{ $errors->has('purchase_code') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{ __('Purchase code') }}</label>
                                                <input type="text" class="form-control" name="purchase_code"
                                                    id="purchase_code" value="{{ old('purchase_code') }}" onkeypress="return /[0-9a-zA-Z-]/i.test(event.key)"
                                                    placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" autocomplete="off">
                                                <small class="form-hint">
                                                    <p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"
                                                            target="_blank">{{ __("Where is my purchase code?") }}</a>
                                                    </p>
                                                </small>
                                            </div>

                                            @if ($errors->has('purchase_code'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('purchase_code') }}
                                            </div>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('app_name') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.app_name_label')
                                                    }}</label>
                                                <input type="text" class="form-control" name="app_name" id="app_name"
                                                    value="{{ __('GoBiz') }}" onkeypress="return blockSpecialChar(event)"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.app_name_placeholder') }}" autocomplete="off">
                                            </div>

                                            @if ($errors->has('app_name'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('app_name') }}
                                            </div>
                                            @endif
                                        </div>

                                        @php
                                            use Illuminate\Support\Facades\Request as serverReq;
                                            $server_name = serverReq::server("SERVER_NAME");
                                            $url = pathinfo($_SERVER['SERVER_NAME'], PATHINFO_EXTENSION);
                                        @endphp


                                        <div class="form-group {{ $errors->has('environment') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.app_environment_label')
                                                    }}
                                                </label>
                                                <select name="environment" id="environment"
                                                    onchange='checkEnvironment(this.value);' class="form-select">

                                                    <option value="local" {{ $server_name == "localhost" && $server_name == "127.0.0.1" && $url == "test" ? 'selected' : '' }}>
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_environment_label_local')
                                                        }}
                                                    </option>

                                                    <option value="development">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_environment_label_developement')
                                                        }}
                                                    </option>

                                                    <option value="qa">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_environment_label_qa')
                                                        }}</option>
                                                    </option>

                                                    <option value="production" {{ $server_name != "localhost" && $server_name != "127.0.0.1" && $url != "test" ? 'selected' : '' }}>
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_environment_label_production')
                                                        }}
                                                    </option>

                                                    <option value="other">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_environment_label_other')
                                                        }}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div id="environment_text_input" style="display: none;">
                                            <input type="text" name="environment_custom" id="environment_custom"
                                                placeholder="{{ trans('installer_messages.environment.wizard.form.app_environment_placeholder_other') }}" />
                                        </div>
                                        @if ($errors->has('environment'))

                                        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                                            {{ $errors->first('environment') }}
                                        </div>

                                        @endif




                                        <div class="form-group {{ $errors->has('app_debug') ? ' has-error ' : '' }}">



                                            <div class="mb-3">
                                                <div class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.app_debug_label')
                                                    }}</div>
                                                <div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="app_debug"
                                                            id="app_debug_true" value=true type="radio">
                                                        <span class="form-check-label">{{
                                                            trans('installer_messages.environment.wizard.form.app_debug_label_true')
                                                            }}</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="app_debug"
                                                            id="app_debug_false" value=false checked type="radio">
                                                        <span class="form-check-label">{{
                                                            trans('installer_messages.environment.wizard.form.app_debug_label_false')
                                                            }}</span>
                                                    </label>

                                                </div>
                                            </div>

                                            @if ($errors->has('app_debug'))

                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('app_debug') }}
                                            </div>

                                            @endif


                                        </div>





                                        <div
                                            class="form-group {{ $errors->has('app_log_level') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.app_log_level_label')
                                                    }}
                                                </label>
                                                <select class="form-select" name="app_log_level" id="app_log_level">

                                                    <option value="debug" selected>
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_debug')
                                                        }}
                                                    </option>

                                                    <option value="info">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_info')
                                                        }}
                                                    </option>

                                                    <option value="notice">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_notice')
                                                        }}</option>
                                                    </option>

                                                    <option value="warning">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_warning')
                                                        }}
                                                    </option>

                                                    <option value="error">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_error')
                                                        }}
                                                    </option>

                                                    <option value="critical">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_critical')
                                                        }}
                                                    </option>

                                                    <option value="alert">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_alert')
                                                        }}
                                                    </option>

                                                    <option value="emergency">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_log_level_label_emergency')
                                                        }}
                                                    </option>

                                                </select>
                                            </div>

                                            @if ($errors->has('app_log_level'))

                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('app_log_level') }}
                                            </div>

                                            @endif

                                        </div>






                                        <div class="form-group {{ $errors->has('app_url') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ trans('installer_messages.environment.wizard.form.app_url_label')
                                                    }}
                                                </label>
                                                <input type="url" name="app_url" id="app_url" class="form-control"
                                                    value="{{ request()->getSchemeAndHttpHost() }}"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.app_url_placeholder') }}" autocomplete="off">
                                            </div>


                                            @if ($errors->has('app_url'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('app_url') }}
                                            </div>
                                            @endif

                                        </div>


                                        <div style="display: none;" class="buttons">
                                            <button class="btn btn-primary ms-auto"
                                                onclick="showDatabaseSettings();return false">
                                                {{
                                                trans('installer_messages.environment.wizard.form.buttons.setup_database')
                                                }}
                                            </button>
                                        </div>
                                    </div>

                                    <hr>


                                    <div class="tab" id="tab2content">


                                        <div
                                            class="form-group {{ $errors->has('database_connection') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.db_connection_label')
                                                    }}
                                                </label>
                                                <select class="form-select" name="database_connection"
                                                    id="database_connection">

                                                    <option value="mysql" selected>
                                                        {{ __(("MySQL")) }}
                                                    </option>

                                                </select>
                                            </div>


                                            @if ($errors->has('database_connection'))

                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('database_connection') }}
                                            </div>
                                            @endif

                                        </div>







                                        <div
                                            class="form-group {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.db_host_label')
                                                    }}</label>
                                                <input type="text" class="form-control" name="database_hostname"
                                                    id="database_hostname" value="127.0.0.1" value="{{ old('database_hostname') }}"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.db_host_placeholder') }}" autocomplete="off">
                                            </div>

                                            @if ($errors->has('database_hostname'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('database_hostname') }}
                                            </div>
                                            @endif
                                        </div>



                                        <div
                                            class="form-group {{ $errors->has('database_port') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.db_port_label')
                                                    }}</label>
                                                <input type="number" class="form-control" name="database_port"
                                                    id="database_port" value="3306"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.db_port_placeholder') }}" autocomplete="off">
                                            </div>

                                            @if ($errors->has('database_port'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('database_port') }}
                                            </div>
                                            @endif

                                        </div>



                                        <div
                                            class="form-group {{ $errors->has('database_name') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.db_name_label') }}
                                                </label>
                                                <input type="text" class="form-control" name="database_name"
                                                    id="database_name" value="{{ old('database_name') }}"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.db_name_placeholder') }}" autocomplete="off">
                                            </div>

                                            @if ($errors->has('database_name'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('database_name') }}
                                            </div>
                                            @endif

                                        </div>


                                        <div
                                            class="form-group {{ $errors->has('database_username') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.db_username_label')
                                                    }} </label>
                                                <input type="text" class="form-control" name="database_username"
                                                    id="database_username" value="{{ old('database_username') }}"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.db_username_placeholder') }}" autocomplete="off">
                                            </div>

                                            @if ($errors->has('database_username'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('database_username') }}
                                            </div>
                                            @endif

                                        </div>



                                        <div
                                            class="form-group {{ $errors->has('database_password') ? ' has-error ' : '' }}">

                                            <div class="mb-3">
                                                <label class="form-label"> {{
                                                    trans('installer_messages.environment.wizard.form.db_password_label')
                                                    }} </label>
                                                <input type="password" class="form-control" name="database_password"
                                                    id="database_password" value="{{ old('database_password') }}"
                                                    placeholder="{{ trans('installer_messages.environment.wizard.form.db_password_placeholder') }}" autocomplete="off">
                                            </div>

                                            @if ($errors->has('database_password'))
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                {{ $errors->first('database_password') }}
                                            </div>
                                            @endif

                                        </div>



                                        <div style="display: none" class="buttons">
                                            <button class="button btn btn-primary"
                                                onclick="showApplicationSettings();return false">
                                                {{
                                                trans('installer_messages.environment.wizard.form.buttons.setup_application')
                                                }}
                                            </button>
                                        </div>

                                    </div>

                                    <div class="tab" style="display: none;" id="tab3content">
                                        <div class="block">
                                            <input type="radio" name="appSettingsTabs" id="appSettingsTab1" value="null"
                                                checked />
                                            <label for="appSettingsTab1">
                                                <span>
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_title')
                                                    }}
                                                </span>
                                            </label>





                                            <div class="info">
                                                <div
                                                    class="form-group {{ $errors->has('broadcast_driver') ? ' has-error ' : '' }}">
                                                    <label for="broadcast_driver">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_label')
                                                        }}
                                                        <sup>
                                                            <a href="https://laravel.com/docs/5.4/broadcasting"
                                                                target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="broadcast_driver" id="broadcast_driver"
                                                        value="log"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_placeholder') }}" />
                                                    @if ($errors->has('broadcast_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('broadcast_driver') }}
                                                    </span>
                                                    @endif
                                                </div>

                                                <div
                                                    class="form-group {{ $errors->has('cache_driver') ? ' has-error ' : '' }}">
                                                    <label for="cache_driver">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.cache_label')
                                                        }}
                                                        <sup>
                                                            <a href="https://laravel.com/docs/5.4/cache" target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="cache_driver" id="cache_driver"
                                                        value="file"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.cache_placeholder') }}" />
                                                    @if ($errors->has('cache_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('cache_driver') }}
                                                    </span>
                                                    @endif
                                                </div>

                                                <div
                                                    class="form-group {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                                                    <label for="session_driver">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.session_label')
                                                        }}
                                                        <sup>
                                                            <a href="https://laravel.com/docs/5.4/session"
                                                                target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="session_driver" id="session_driver"
                                                        value="file"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.session_placeholder') }}" />
                                                    @if ($errors->has('session_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('session_driver') }}
                                                    </span>
                                                    @endif
                                                </div>

                                                <div
                                                    class="form-group {{ $errors->has('queue_driver') ? ' has-error ' : '' }}">
                                                    <label for="queue_driver">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.queue_label')
                                                        }}
                                                        <sup>
                                                            <a href="https://laravel.com/docs/5.4/queues"
                                                                target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="queue_driver" id="queue_driver"
                                                        value="sync"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.queue_placeholder') }}" />
                                                    @if ($errors->has('queue_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('queue_driver') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <input type="radio" name="appSettingsTabs" id="appSettingsTab2"
                                                value="null" />
                                            <label for="appSettingsTab2">
                                                <span>
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.app_tabs.redis_label')
                                                    }}
                                                </span>
                                            </label>
                                            <div class="info">
                                                <div
                                                    class="form-group {{ $errors->has('redis_hostname') ? ' has-error ' : '' }}">
                                                    <label for="redis_hostname">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.redis_host')
                                                        }}
                                                        <sup>
                                                            <a href="https://laravel.com/docs/5.4/redis" target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="redis_hostname" id="redis_hostname"
                                                        value="127.0.0.1"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_host') }}" />
                                                    @if ($errors->has('redis_hostname'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('redis_hostname') }}
                                                    </span>
                                                    @endif
                                                </div>

                                                <div
                                                    class="form-group {{ $errors->has('redis_password') ? ' has-error ' : '' }}">
                                                    <label for="redis_password">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.redis_password')
                                                        }}</label>
                                                    <input type="password" name="redis_password" id="redis_password"
                                                        value="null"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_password') }}" />
                                                    @if ($errors->has('redis_password'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('redis_password') }}
                                                    </span>
                                                    @endif
                                                </div>

                                                <div
                                                    class="form-group {{ $errors->has('redis_port') ? ' has-error ' : '' }}">
                                                    <label for="redis_port">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.redis_port')
                                                        }}</label>
                                                    <input type="number" name="redis_port" id="redis_port" value="6379"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_port') }}" />
                                                    @if ($errors->has('redis_port'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('redis_port') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <input type="radio" name="appSettingsTabs" id="appSettingsTab3"
                                                value="null" />
                                            <label for="appSettingsTab3">
                                                <span>
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.app_tabs.mail_label')
                                                    }}
                                                </span>
                                            </label>
                                            <div class="info">
                                                <div
                                                    class="form-group {{ $errors->has('mail_driver') ? ' has-error ' : '' }}">
                                                    <label for="mail_driver">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.mail_driver_label')
                                                        }}
                                                        <sup>
                                                            <a href="https://laravel.com/docs/5.4/mail" target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="mail_driver" id="mail_driver" value="smtp"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_driver_placeholder') }}" />
                                                    @if ($errors->has('mail_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('mail_driver') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                                                    <label for="mail_host">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.mail_host_label')
                                                        }}</label>
                                                    <input type="text" name="mail_host" id="mail_host"
                                                        value="smtp.mailtrap.io"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}" />
                                                    @if ($errors->has('mail_host'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('mail_host') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                                                    <label for="mail_port">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.mail_port_label')
                                                        }}</label>
                                                    <input type="number" name="mail_port" id="mail_port" value="2525"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_port_placeholder') }}" />
                                                    @if ($errors->has('mail_port'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('mail_port') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('mail_username') ? ' has-error ' : '' }}">
                                                    <label for="mail_username">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.mail_username_label')
                                                        }}</label>
                                                    <input type="text" name="mail_username" id="mail_username"
                                                        value="null"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_username_placeholder') }}" />
                                                    @if ($errors->has('mail_username'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('mail_username') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('mail_password') ? ' has-error ' : '' }}">
                                                    <label for="mail_password">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.mail_password_label')
                                                        }}</label>
                                                    <input type="text" name="mail_password" id="mail_password"
                                                        value="null"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_password_placeholder') }}" />
                                                    @if ($errors->has('mail_password'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('mail_password') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('mail_encryption') ? ' has-error ' : '' }}">
                                                    <label for="mail_encryption">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.mail_encryption_label')
                                                        }}</label>
                                                    <input type="text" name="mail_encryption" id="mail_encryption"
                                                        value="null"
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_encryption_placeholder') }}" />
                                                    @if ($errors->has('mail_encryption'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('mail_encryption') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block margin-bottom-2">
                                            <input type="radio" name="appSettingsTabs" id="appSettingsTab4"
                                                value="null" />
                                            <label for="appSettingsTab4">
                                                <span>
                                                    {{
                                                    trans('installer_messages.environment.wizard.form.app_tabs.pusher_label')
                                                    }}
                                                </span>
                                            </label>
                                            <div class="info">
                                                <div
                                                    class="form-group {{ $errors->has('pusher_app_id') ? ' has-error ' : '' }}">
                                                    <label for="pusher_app_id">
                                                        {{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_label')
                                                        }}
                                                        <sup>
                                                            <a href="https://pusher.com/docs/server_api_guide"
                                                                target="_blank"
                                                                title="{{ trans('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                                <i class="fa fa-info-circle fa-fw"
                                                                    aria-hidden="true"></i>
                                                                <span class="sr-only">{{
                                                                    trans('installer_messages.environment.wizard.form.app_tabs.more_info')
                                                                    }}</span>
                                                            </a>
                                                        </sup>
                                                    </label>
                                                    <input type="text" name="pusher_app_id" id="pusher_app_id" value=""
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_palceholder') }}" />
                                                    @if ($errors->has('pusher_app_id'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('pusher_app_id') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('pusher_app_key') ? ' has-error ' : '' }}">
                                                    <label for="pusher_app_key">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_label')
                                                        }}</label>
                                                    <input type="text" name="pusher_app_key" id="pusher_app_key"
                                                        value=""
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_palceholder') }}" />
                                                    @if ($errors->has('pusher_app_key'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('pusher_app_key') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group {{ $errors->has('pusher_app_secret') ? ' has-error ' : '' }}">
                                                    <label for="pusher_app_secret">{{
                                                        trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_label')
                                                        }}</label>
                                                    <input type="password" name="pusher_app_secret"
                                                        id="pusher_app_secret" value=""
                                                        placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_palceholder') }}" />
                                                    @if ($errors->has('pusher_app_secret'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle"
                                                            aria-hidden="true"></i>
                                                        {{ $errors->first('pusher_app_secret') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="buttons">
                                        <button class="button btn btn-primary" type="submit">
                                            {{ trans('installer_messages.environment.wizard.form.buttons.install') }}
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="hr-text hr-text-center mb-4 mt-4 hr-text-spaceless">Installation Progress</div>

                        <div class="row item-align-center">

                            <div class="col-3">&nbsp;</div>
                            <div class="col-6 pb-4 pt-4">

                                <div class="progress">

                                    @if (Request::is('install'))
                                    <div class="progress-bar" style="width: 0%" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="visually-hidden">0% Complete</span>
                                    </div>
                                    @endif

                                    @if (Request::is('install/requirements'))
                                    <div class="progress-bar" style="width: 10%" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="visually-hidden">10% Complete</span>
                                    </div>

                                    @endif


                                    @if (Request::is('install/permissions'))
                                    <div class="progress-bar" style="width: 20%" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="visually-hidden">20% Complete</span>
                                    </div>

                                    @endif


                                    @if (Request::is('install/environment'))
                                    <div class="progress-bar" style="width: 40%" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="visually-hidden">40% Complete</span>
                                    </div>

                                    @endif


                                    @if (Request::is('install/environment/wizard') ||
                                    Request::is('install/environment/classic'))
                                    <div class="progress-bar" style="width: 70%" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="visually-hidden">70% Complete</span>
                                    </div>

                                    @endif

                                    @if (Request::is('install/final'))
                                    <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
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







    <script type="text/javascript">
        var x = document.getElementById('error_alert');
var y = document.getElementById('close_alert');
y.onclick = function() {
x.style.display = "none";
};
    </script>
    <script type="text/javascript">
        function checkEnvironment(val) {
            var element = document.getElementById('environment_text_input');
            if (val == 'other') {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }

        function showDatabaseSettings() {
            document.getElementById('tab2').checked = true;
        }

        function showApplicationSettings() {
            document.getElementById('tab3').checked = true;
        }
        function blockSpecialChar(e){
            var k;
            document.all ? k = e.keyCode : k = e.which;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }
    </script>
</body>

</html>