@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true])

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
                        {{ __('Checkout') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    @if ($selected_plan == null)
    <div class="container-xl mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ __('No Plan Found') }}</h3>
                    <a href="{{ route('user.checkout', Request::segment(3)) }}"
                        class="btn btn-primary">{{ __('Back') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container-xl mt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Upgrade/Renewal Plan') }}</h3>

                        <div class="card-table table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="w-1">{{ __('Description') }}</th>
                                        <th class="w-1">{{ __('Price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                {{ __($selected_plan->plan_name) }} - {{ __($selected_plan->validity) }}
                                                {{ __('Days') }}
                                            </div>
                                        </td>
                                        <td class="text-bold">
                                            {{ $currency->symbol }}{{ $selected_plan->plan_price == '0' ? 0 : number_format($selected_plan->plan_price,2) }}
                                        </td>
                                    </tr>

                                    @if ($config[25]->config_value > 0)

                                    <tr>
                                        <td>
                                            <div>
                                                {{ __($config[24]->config_value) }}
                                            </div>
                                        </td>
                                        <td class="text-bold"> {{ $currency->symbol }}{{ (int)$selected_plan->plan_price * $config[25]->config_value / 100, 2 }}
                                        </td>
                                    </tr>

                                    @endif

                                    <tr>
                                        <td class="h3 text-bold"> {{ __('Total Payable Amount') }} </td>
                                        <td class="w-1 text-bold h3"> {{ $currency->symbol }}{{ number_format($total, 2) }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form action="{{ route('prepare.payment.gateway', $selected_plan->plan_id) }}" method="post">
                    @csrf
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row">
                                        <h3 class="card-title text-muted mb-3">{{ __('Billing Details') }}</h1>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="billing_name"
                                                    placeholder="{{ __('Name') }}..." value="{{ Auth::user()->billing_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Email') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="billing_email"
                                                    placeholder="{{ __('Email') }}..." value="{{ Auth::user()->billing_email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Phone') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control" name="billing_phone"
                                                    placeholder="{{ __('Phone') }}..."
                                                    value="{{ Auth::user()->billing_phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Billing Address') }} <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" name="billing_address" id="billing_address"
                                                    cols="10" rows="3"
                                                    placeholder="{{ __('Billing Address') }}..." required>{{ Auth::user()->billing_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Billing City') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="billing_city"
                                                    placeholder="{{ __('Billing City') }}..."
                                                    value="{{ Auth::user()->billing_city }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Billing State/Province') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="billing_state"
                                                    placeholder="{{ __('Billing State/Province') }}..."
                                                    value="{{ Auth::user()->billing_state }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Billing Zip Code') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="billing_zipcode"
                                                    placeholder="{{ __('Billing Zip Code') }}..."
                                                    value="{{ Auth::user()->billing_zipcode }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Billing Country') }} <span
                                                        class="text-danger">*</span></label>


                                                <select value="{{ Auth::user()->billing_country }}"
                                                    name="billing_country" class="form-control" required>

                                                    <option {{ Auth::user()->billing_country == null ? 'selected' : '' }}
                                                        value="" selected disabled>Choose Country</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Afghanistan' ? 'selected' : '' }}
                                                        value="Afghanistan">Afghanistan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Aland Islands' ? 'selected' : '' }}
                                                        value="Aland Islands">Åland Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Albania' ? 'selected' : '' }}
                                                        value="Albania">Albania</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Algeria' ? 'selected' : '' }}
                                                        value="Algeria">Algeria</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'American Samoa' ? 'selected' : '' }}
                                                        value="American Samoa">American Samoa</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Andorra' ? 'selected' : '' }}
                                                        value="Andorra">Andorra</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Angola' ? 'selected' : '' }}
                                                        value="Angola">Angola</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Anguilla' ? 'selected' : '' }}
                                                        value="Anguilla">Anguilla</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Antarctica' ? 'selected' : '' }}
                                                        value="Antarctica">Antarctica</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Antigua and Barbuda' ? 'selected' : '' }}
                                                        value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Argentina' ? 'selected' : '' }}
                                                        value="Argentina">Argentina</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Armenia' ? 'selected' : '' }}
                                                        value="Armenia">Armenia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Aruba' ? 'selected' : '' }}
                                                        value="Aruba">Aruba</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Australia' ? 'selected' : '' }}
                                                        value="Australia">Australia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Austria' ? 'selected' : '' }}
                                                        value="Austria">Austria</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Azerbaijan' ? 'selected' : '' }}
                                                        value="Azerbaijan">Azerbaijan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bahamas' ? 'selected' : '' }}
                                                        value="Bahamas">Bahamas</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bahrain' ? 'selected' : '' }}
                                                        value="Bahrain">Bahrain</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bangladesh' ? 'selected' : '' }}
                                                        value="Bangladesh">Bangladesh</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Barbados' ? 'selected' : '' }}
                                                        value="Barbados">Barbados</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Belarus' ? 'selected' : '' }}
                                                        value="Belarus">Belarus</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Belgium' ? 'selected' : '' }}
                                                        value="Belgium">Belgium</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Belize' ? 'selected' : '' }}
                                                        value="Belize">Belize</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Benin' ? 'selected' : '' }}
                                                        value="Benin">Benin</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bermuda' ? 'selected' : '' }}
                                                        value="Bermuda">Bermuda</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bhutan' ? 'selected' : '' }}
                                                        value="Bhutan">Bhutan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bolivia' ? 'selected' : '' }}
                                                        value="Bolivia">Bolivia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bosnia and Herzegovina' ? 'selected' : '' }}
                                                        value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Botswana' ? 'selected' : '' }}
                                                        value="Botswana">Botswana</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bouvet Island' ? 'selected' : '' }}
                                                        value="Bouvet Island">Bouvet Island</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Brazil' ? 'selected' : '' }}
                                                        value="Brazil">Brazil</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'British Indian Ocean Territory' ? 'selected' : '' }}
                                                        value="British Indian Ocean Territory">British Indian Ocean
                                                        Territory</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Brunei Darussalam' ? 'selected' : '' }}
                                                        value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Bulgaria' ? 'selected' : '' }}
                                                        value="Bulgaria">Bulgaria</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Burkina Faso' ? 'selected' : '' }}
                                                        value="Burkina Faso">Burkina Faso</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Burundi' ? 'selected' : '' }}
                                                        value="Burundi">Burundi</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cambodia' ? 'selected' : '' }}
                                                        value="Cambodia">Cambodia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cameroon' ? 'selected' : '' }}
                                                        value="Cameroon">Cameroon</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Canada' ? 'selected' : '' }}
                                                        value="Canada">Canada</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cape Verde' ? 'selected' : '' }}
                                                        value="Cape Verde">Cape Verde</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cayman Islands' ? 'selected' : '' }}
                                                        value="Cayman Islands">Cayman Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Central African Republic' ? 'selected' : '' }}
                                                        value="Central African Republic">Central African Republic</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Chad' ? 'selected' : '' }}
                                                        value="Chad">Chad</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Chile' ? 'selected' : '' }}
                                                        value="Chile">Chile</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'China' ? 'selected' : '' }}
                                                        value="China">China</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Christmas Island' ? 'selected' : '' }}
                                                        value="Christmas Island">Christmas Island</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cocos (Keeling) Islands' ? 'selected' : '' }}
                                                        value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Colombia' ? 'selected' : '' }}
                                                        value="Colombia">Colombia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Comoros' ? 'selected' : '' }}
                                                        value="Comoros">Comoros</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Congo' ? 'selected' : '' }}
                                                        value="Congo">Congo</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Congo, The Democratic Republic of The' ? 'selected' : '' }}
                                                        value="Congo, The Democratic Republic of The">Congo, The Democratic
                                                        Republic of The</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cook Islands' ? 'selected' : '' }}
                                                        value="Cook Islands">Cook Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Costa Rica' ? 'selected' : '' }}
                                                        value="Costa Rica">Costa Rica</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == "Cote D'ivoire" ? 'selected' : '' }}
                                                        value="Cote D'ivoire">Cote D'ivoire</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Croatia' ? 'selected' : '' }}
                                                        value="Croatia">Croatia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cuba' ? 'selected' : '' }}
                                                        value="Cuba">Cuba</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Cyprus' ? 'selected' : '' }}
                                                        value="Cyprus">Cyprus</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Czech Republic' ? 'selected' : '' }}
                                                        value="Czech Republic">Czech Republic</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Denmark' ? 'selected' : '' }}
                                                        value="Denmark">Denmark</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Djibouti' ? 'selected' : '' }}
                                                        value="Djibouti">Djibouti</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Dominica' ? 'selected' : '' }}
                                                        value="Dominica">Dominica</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Dominican Republic' ? 'selected' : '' }}
                                                        value="Dominican Republic">Dominican Republic</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Ecuador' ? 'selected' : '' }}
                                                        value="Ecuador">Ecuador</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Egypt' ? 'selected' : '' }}
                                                        value="Egypt">Egypt</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'El Salvador' ? 'selected' : '' }}
                                                        value="El Salvador">El Salvador</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Equatorial Guinea' ? 'selected' : '' }}
                                                        value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Eritrea' ? 'selected' : '' }}
                                                        value="Eritrea">Eritrea</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Estonia' ? 'selected' : '' }}
                                                        value="Estonia">Estonia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Ethiopia' ? 'selected' : '' }}
                                                        value="Ethiopia">Ethiopia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Falkland Islands (Malvinas)' ? 'selected' : '' }}
                                                        value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                    </option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Faroe Islands' ? 'selected' : '' }}
                                                        value="Faroe Islands">Faroe Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Fiji' ? 'selected' : '' }}
                                                        value="Fiji">Fiji</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Finland' ? 'selected' : '' }}
                                                        value="Finland">Finland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'France' ? 'selected' : '' }}
                                                        value="France">France</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'French Guiana' ? 'selected' : '' }}
                                                        value="French Guiana">French Guiana</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'French Polynesia' ? 'selected' : '' }}
                                                        value="French Polynesia">French Polynesia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'French Southern Territories' ? 'selected' : '' }}
                                                        value="French Southern Territories">French Southern Territories
                                                    </option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Gabon' ? 'selected' : '' }}
                                                        value="Gabon">Gabon</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Gambia' ? 'selected' : '' }}
                                                        value="Gambia">Gambia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Georgia' ? 'selected' : '' }}
                                                        value="Georgia">Georgia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Germany' ? 'selected' : '' }}
                                                        value="Germany">Germany</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Ghana' ? 'selected' : '' }}
                                                        value="Ghana">Ghana</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Gibraltar' ? 'selected' : '' }}
                                                        value="Gibraltar">Gibraltar</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Greece' ? 'selected' : '' }}
                                                        value="Greece">Greece</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Greenland' ? 'selected' : '' }}
                                                        value="Greenland">Greenland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Grenada' ? 'selected' : '' }}
                                                        value="Grenada">Grenada</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guadeloupe' ? 'selected' : '' }}
                                                        value="Guadeloupe">Guadeloupe</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guam' ? 'selected' : '' }}
                                                        value="Guam">Guam</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guatemala' ? 'selected' : '' }}
                                                        value="Guatemala">Guatemala</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guernsey' ? 'selected' : '' }}
                                                        value="Guernsey">Guernsey</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guinea' ? 'selected' : '' }}
                                                        value="Guinea">Guinea</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guinea-bissau' ? 'selected' : '' }}
                                                        value="Guinea-bissau">Guinea-bissau</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Guyana' ? 'selected' : '' }}
                                                        value="Guyana">Guyana</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Haiti' ? 'selected' : '' }}
                                                        value="Haiti">Haiti</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Heard Island and Mcdonald Islands' ? 'selected' : '' }}
                                                        value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                                        Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Holy See (Vatican City State)' ? 'selected' : '' }}
                                                        value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                                    </option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Honduras' ? 'selected' : '' }}
                                                        value="Honduras">Honduras</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Hong Kong' ? 'selected' : '' }}
                                                        value="Hong Kong">Hong Kong</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Hungary' ? 'selected' : '' }}
                                                        value="Hungary">Hungary</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Iceland' ? 'selected' : '' }}
                                                        value="Iceland">Iceland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'India' ? 'selected' : '' }}
                                                        value="India">India</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Indonesia' ? 'selected' : '' }}
                                                        value="Indonesia">Indonesia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Iran, Islamic Republic of' ? 'selected' : '' }}
                                                        value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Iraq' ? 'selected' : '' }}
                                                        value="Iraq">Iraq</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Ireland' ? 'selected' : '' }}
                                                        value="Ireland">Ireland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Isle of Man' ? 'selected' : '' }}
                                                        value="Isle of Man">Isle of Man</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Israel' ? 'selected' : '' }}
                                                        value="Israel">Israel</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Italy' ? 'selected' : '' }}
                                                        value="Italy">Italy</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Jamaica' ? 'selected' : '' }}
                                                        value="Jamaica">Jamaica</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Japan' ? 'selected' : '' }}
                                                        value="Japan">Japan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Jersey' ? 'selected' : '' }}
                                                        value="Jersey">Jersey</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Jordan' ? 'selected' : '' }}
                                                        value="Jordan">Jordan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Kazakhstan' ? 'selected' : '' }}
                                                        value="Kazakhstan">Kazakhstan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Kenya' ? 'selected' : '' }}
                                                        value="Kenya">Kenya</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Kiribati' ? 'selected' : '' }}
                                                        value="Kiribati">Kiribati</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == "Korea, Democratic People's Republic of" ? 'selected' : '' }}
                                                        value="Korea, Democratic People's Republic of">Korea, Democratic
                                                        People's Republic of</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Korea, Republic of' ? 'selected' : '' }}
                                                        value="Korea, Republic of">Korea, Republic of</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Kuwait' ? 'selected' : '' }}
                                                        value="Kuwait">Kuwait</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Kyrgyzstan' ? 'selected' : '' }}
                                                        value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == "Lao People's Democratic Republic" ? 'selected' : '' }}
                                                        value="Lao People's Democratic Republic">Lao People's Democratic
                                                        Republic</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Latvia' ? 'selected' : '' }}
                                                        value="Latvia">Latvia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Lebanon' ? 'selected' : '' }}
                                                        value="Lebanon">Lebanon</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Lesotho' ? 'selected' : '' }}
                                                        value="Lesotho">Lesotho</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Liberia' ? 'selected' : '' }}
                                                        value="Liberia">Liberia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Libyan Arab Jamahiriya' ? 'selected' : '' }}
                                                        value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Liechtenstein' ? 'selected' : '' }}
                                                        value="Liechtenstein">Liechtenstein</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Lithuania' ? 'selected' : '' }}
                                                        value="Lithuania">Lithuania</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Luxembourg' ? 'selected' : '' }}
                                                        value="Luxembourg">Luxembourg</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Macao' ? 'selected' : '' }}
                                                        value="Macao">Macao</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : '' }}
                                                        value="Macedonia, The Former Yugoslav Republic of">Macedonia, The
                                                        Former Yugoslav Republic of</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Madagascar' ? 'selected' : '' }}
                                                        value="Madagascar">Madagascar</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Malawi' ? 'selected' : '' }}
                                                        value="Malawi">Malawi</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Malaysia' ? 'selected' : '' }}
                                                        value="Malaysia">Malaysia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Maldives' ? 'selected' : '' }}
                                                        value="Maldives">Maldives</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mali' ? 'selected' : '' }}
                                                        value="Mali">Mali</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Malta' ? 'selected' : '' }}
                                                        value="Malta">Malta</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Marshall Islands' ? 'selected' : '' }}
                                                        value="Marshall Islands">Marshall Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Martinique' ? 'selected' : '' }}
                                                        value="Martinique">Martinique</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mauritania' ? 'selected' : '' }}
                                                        value="Mauritania">Mauritania</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mauritius' ? 'selected' : '' }}
                                                        value="Mauritius">Mauritius</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mayotte' ? 'selected' : '' }}
                                                        value="Mayotte">Mayotte</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mexico' ? 'selected' : '' }}
                                                        value="Mexico">Mexico</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Micronesia, Federated States of' ? 'selected' : '' }}
                                                        value="Micronesia, Federated States of">Micronesia, Federated States
                                                        of</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Moldova, Republic of' ? 'selected' : '' }}
                                                        value="Moldova, Republic of">Moldova, Republic of</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Monaco' ? 'selected' : '' }}
                                                        value="Monaco">Monaco</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mongolia' ? 'selected' : '' }}
                                                        value="Mongolia">Mongolia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Montenegro' ? 'selected' : '' }}
                                                        value="Montenegro">Montenegro</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Montserrat' ? 'selected' : '' }}
                                                        value="Montserrat">Montserrat</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Morocco' ? 'selected' : '' }}
                                                        value="Morocco">Morocco</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Mozambique' ? 'selected' : '' }}
                                                        value="Mozambique">Mozambique</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Myanmar' ? 'selected' : '' }}
                                                        value="Myanmar">Myanmar</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Namibia' ? 'selected' : '' }}
                                                        value="Namibia">Namibia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Nauru' ? 'selected' : '' }}
                                                        value="Nauru">Nauru</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Nepal' ? 'selected' : '' }}
                                                        value="Nepal">Nepal</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Netherlands' ? 'selected' : '' }}
                                                        value="Netherlands">Netherlands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Netherlands Antilles' ? 'selected' : '' }}
                                                        value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'New Caledonia' ? 'selected' : '' }}
                                                        value="New Caledonia">New Caledonia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'New Zealand' ? 'selected' : '' }}
                                                        value="New Zealand">New Zealand</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Nicaragua' ? 'selected' : '' }}
                                                        value="Nicaragua">Nicaragua</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Niger' ? 'selected' : '' }}
                                                        value="Niger">Niger</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Nigeria' ? 'selected' : '' }}
                                                        value="Nigeria">Nigeria</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Niue' ? 'selected' : '' }}
                                                        value="Niue">Niue</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Norfolk Island' ? 'selected' : '' }}
                                                        value="Norfolk Island">Norfolk Island</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Northern Mariana Islands' ? 'selected' : '' }}
                                                        value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Norway' ? 'selected' : '' }}
                                                        value="Norway">Norway</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Oman' ? 'selected' : '' }}
                                                        value="Oman">Oman</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Pakistan' ? 'selected' : '' }}
                                                        value="Pakistan">Pakistan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Palau' ? 'selected' : '' }}
                                                        value="Palau">Palau</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Palestinian Territory, Occupied' ? 'selected' : '' }}
                                                        value="Palestinian Territory, Occupied">Palestinian Territory,
                                                        Occupied</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Panama' ? 'selected' : '' }}
                                                        value="Panama">Panama</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Papua New Guinea' ? 'selected' : '' }}
                                                        value="Papua New Guinea">Papua New Guinea</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Paraguay' ? 'selected' : '' }}
                                                        value="Paraguay">Paraguay</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Peru' ? 'selected' : '' }}
                                                        value="Peru">Peru</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Philippines' ? 'selected' : '' }}
                                                        value="Philippines">Philippines</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Pitcairn' ? 'selected' : '' }}
                                                        value="Pitcairn">Pitcairn</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Poland' ? 'selected' : '' }}
                                                        value="Poland">Poland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Portugal' ? 'selected' : '' }}
                                                        value="Portugal">Portugal</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Puerto Rico' ? 'selected' : '' }}
                                                        value="Puerto Rico">Puerto Rico</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Qatar' ? 'selected' : '' }}
                                                        value="Qatar">Qatar</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Reunion' ? 'selected' : '' }}
                                                        value="Reunion">Reunion</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Romania' ? 'selected' : '' }}
                                                        value="Romania">Romania</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Russian Federation' ? 'selected' : '' }}
                                                        value="Russian Federation">Russian Federation</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Rwanda' ? 'selected' : '' }}
                                                        value="Rwanda">Rwanda</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Saint Helena' ? 'selected' : '' }}
                                                        value="Saint Helena">Saint Helena</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Saint Kitts and Nevis' ? 'selected' : '' }}
                                                        value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Saint Lucia' ? 'selected' : '' }}
                                                        value="Saint Lucia">Saint Lucia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Saint Pierre and Miquelon' ? 'selected' : '' }}
                                                        value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Saint Vincent and The Grenadines' ? 'selected' : '' }}
                                                        value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                        Grenadines</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Samoa' ? 'selected' : '' }}
                                                        value="Samoa">Samoa</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'San Marino' ? 'selected' : '' }}
                                                        value="San Marino">San Marino</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Sao Tome and Principe' ? 'selected' : '' }}
                                                        value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Saudi Arabia' ? 'selected' : '' }}
                                                        value="Saudi Arabia">Saudi Arabia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Senegal' ? 'selected' : '' }}
                                                        value="Senegal">Senegal</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Serbia' ? 'selected' : '' }}
                                                        value="Serbia">Serbia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Seychelles' ? 'selected' : '' }}
                                                        value="Seychelles">Seychelles</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Sierra Leone' ? 'selected' : '' }}
                                                        value="Sierra Leone">Sierra Leone</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Singapore' ? 'selected' : '' }}
                                                        value="Singapore">Singapore</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Slovakia' ? 'selected' : '' }}
                                                        value="Slovakia">Slovakia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Slovenia' ? 'selected' : '' }}
                                                        value="Slovenia">Slovenia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Solomon Islands' ? 'selected' : '' }}
                                                        value="Solomon Islands">Solomon Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Somalia' ? 'selected' : '' }}
                                                        value="Somalia">Somalia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'South Africa' ? 'selected' : '' }}
                                                        value="South Africa">South Africa</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'South Georgia and The South Sandwich Islands' ? 'selected' : '' }}
                                                        value="South Georgia and The South Sandwich Islands">South Georgia
                                                        and The South Sandwich Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Spain' ? 'selected' : '' }}
                                                        value="Spain">Spain</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Sri Lanka' ? 'selected' : '' }}
                                                        value="Sri Lanka">Sri Lanka</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Sudan' ? 'selected' : '' }}
                                                        value="Sudan">Sudan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Suriname' ? 'selected' : '' }}
                                                        value="Suriname">Suriname</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Svalbard and Jan Mayen' ? 'selected' : '' }}
                                                        value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Swaziland' ? 'selected' : '' }}
                                                        value="Swaziland">Swaziland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Sweden' ? 'selected' : '' }}
                                                        value="Sweden">Sweden</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Switzerland' ? 'selected' : '' }}
                                                        value="Switzerland">Switzerland</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Syrian Arab Republic' ? 'selected' : '' }}
                                                        value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Taiwan' ? 'selected' : '' }}
                                                        value="Taiwan">Taiwan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Tajikistan' ? 'selected' : '' }}
                                                        value="Tajikistan">Tajikistan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Tanzania, United Republic of' ? 'selected' : '' }}
                                                        value="Tanzania, United Republic of">Tanzania, United Republic of
                                                    </option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Thailand' ? 'selected' : '' }}
                                                        value="Thailand">Thailand</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Timor-leste' ? 'selected' : '' }}
                                                        value="Timor-leste">Timor-leste</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Togo' ? 'selected' : '' }}
                                                        value="Togo">Togo</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Tokelau' ? 'selected' : '' }}
                                                        value="Tokelau">Tokelau</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Tonga' ? 'selected' : '' }}
                                                        value="Tonga">Tonga</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Trinidad and Tobago' ? 'selected' : '' }}
                                                        value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Tunisia' ? 'selected' : '' }}
                                                        value="Tunisia">Tunisia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Turkey' ? 'selected' : '' }}
                                                        value="Turkey">Turkey</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Turkmenistan' ? 'selected' : '' }}
                                                        value="Turkmenistan">Turkmenistan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Turks and Caicos Islands' ? 'selected' : '' }}
                                                        value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Tuvalu' ? 'selected' : '' }}
                                                        value="Tuvalu">Tuvalu</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Uganda' ? 'selected' : '' }}
                                                        value="Uganda">Uganda</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Ukraine' ? 'selected' : '' }}
                                                        value="Ukraine">Ukraine</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'United Arab Emirates' ? 'selected' : '' }}
                                                        value="United Arab Emirates">United Arab Emirates</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'United Kingdom' ? 'selected' : '' }}
                                                        value="United Kingdom">United Kingdom</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'United States' ? 'selected' : '' }}
                                                        value="United States">United States</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'United States Minor Outlying Islands' ? 'selected' : '' }}
                                                        value="United States Minor Outlying Islands">United States Minor
                                                        Outlying Islands</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Uruguay' ? 'selected' : '' }}
                                                        value="Uruguay">Uruguay</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Uzbekistan' ? 'selected' : '' }}
                                                        value="Uzbekistan">Uzbekistan</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Vanuatu' ? 'selected' : '' }}
                                                        value="Vanuatu">Vanuatu</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Venezuela' ? 'selected' : '' }}
                                                        value="Venezuela">Venezuela</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Viet Nam' ? 'selected' : '' }}
                                                        value="Viet Nam">Viet Nam</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Virgin Islands, British' ? 'selected' : '' }}
                                                        value="Virgin Islands, British">Virgin Islands, British</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Virgin Islands, U.S.' ? 'selected' : '' }}
                                                        value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Wallis and Futuna' ? 'selected' : '' }}
                                                        value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Western Sahara' ? 'selected' : '' }}
                                                        value="Western Sahara">Western Sahara</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Yemen' ? 'selected' : '' }}
                                                        value="Yemen">Yemen</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Zambia' ? 'selected' : '' }}
                                                        value="Zambia">Zambia</option>
                                                    <option
                                                        {{ Auth::user()->billing_country == 'Zimbabwe' ? 'selected' : '' }}
                                                        value="Zimbabwe">Zimbabwe</option>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Tax Number') }} </label>
                                                <input type="text" class="form-control" name="vat_number"
                                                    placeholder="{{ __('Tax Number') }}..."
                                                    value="{{ Auth::user()->vat_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="type">{{ __('Type') }} <span
                                                        class="text-danger">*</span></label>
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="personal"
                                                        {{ Auth::user()->type == 'personal' ? 'selected' : '' }}>
                                                        {{ __('Personal') }}</option>
                                                    <option value="business"
                                                        {{ Auth::user()->type == 'business' ? 'selected' : '' }}>
                                                        {{ __('Business') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-muted">{{ __('Payment method') }}</h3>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                                    @foreach ($gateways as $gateway)
                                                    <label class="form-selectgroup-item flex-fill">
                                                        <input type="radio" name="payment_gateway_id"
                                                            value="{{ $gateway->payment_gateway_id }}"
                                                            class="form-selectgroup-input">
                                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                            <div class="me-3">
                                                                <span class="form-selectgroup-check"></span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    class="payment payment-provider-{{ $gateway->payment_gateway_name == 'Paypal' ? 'paypal' : 'visa' }} payment-xs me-2">
                                                                    <img src="{{ url('/') }}{{ $gateway->payment_gateway_logo }}"
                                                                        alt="">
                                                                </span>
                                                                {{ __($gateway->display_name) }} <strong></strong>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <input type="submit" value="{{ __('Continue for payment') }}"
                                                    class="btn btn-primary">
                                            </div>

                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endif
@include('user.includes.footer')
</div>

@endsection