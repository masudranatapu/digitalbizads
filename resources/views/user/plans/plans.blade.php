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
                            {{ __('Plans') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ __('My plan') }}</h3>

                        @if (isset($active_plan))

                            @if ($active_plan->plan_price == 0)
                                <p class="text-uppercase"><b>{{ __($active_plan->plan_name) }}</b></p>
                                <p>{{ __('FREE PLAN') }}</p>
                            @else
                                <p class="text-uppercase"><b>{{ __($active_plan->plan_name) }}</b></p>
                                @if ($active_plan->validity == 9999)
                                    <p>{{ __('Lifetime') }}</p>
                                @else
                                    <p>{{ $remaining_days > 0 ? __('Remaining Days') . ' : ' . $remaining_days : __('Plan Expired!') }}
                                    </p>
                                @endif
                            @endif

                            <div class="card-text">
                                @if ($free_plan == 0 || $active_plan->plan_price != 0)
                                    <a href="{{ route('user.checkout', $active_plan->plan_id) }}"
                                        class="btn btn-primary">{{ __('Renew') }}</a>
                                @endif
                                <a href="#plans" class="btn btn-primary">{{ __('Upgrade') }}</a>
                            </div>
                        @else
                            <p>{{ __('No active plans!') }}</p>

                            <div class="card-text">
                                <a href="#plans" class="btn btn-primary">{{ __('Choose plan') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div id="plans" class="page-body">
            <div class="container-xl">

                <div class="row">

                    @foreach ($plans as $plan)
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-md">

                                @if ($plan->recommended == '1')
                                    <div class="ribbon ribbon-top ribbon-bookmark bg-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                        </svg>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <div class="text-capitalize text-dark font-weight-bold"> {{ __($plan->plan_name) }}
                                    </div>
                                    <div class="my-3">
                                        <h1 class="display-5 font-weight-bold">
                                            <strong>
                                                {{ $plan->plan_price == '0' ? '' : $currency->symbol }}{{ $plan->plan_price == '0' ? __('FREE') : $plan->plan_price }}
                                            </strong>
                                        </h1>

                                        <small class="text-capitalize">
                                            @if ($plan->validity == '9999')
                                                {{ __('Per') }} {{ __('Forever') }}
                                            @endif
                                            @if ($plan->validity == '31')
                                                {{ __('Per') }} {{ __('Month') }}</span>
                                            @endif
                                            @if ($plan->validity == '366')
                                                {{ __('Per') }} {{ __('Year') }}</span>
                                            @endif
                                            @if ($plan->validity > '1' && $plan->validity != '31' && $plan->validity != '366' && $plan->validity != '9999')
                                                {{ __('Per') . ' ' . $plan->validity . ' ' . __('Days') }}
                                            @endif
                                        </small>
                                    </div>
                                    <hr>
                                    <p class="mt-3">{{ __($plan->plan_description) }}</p>
                                    <ul class="list-unstyled lh-lg">
                                        <li><span>{{ $plan->no_of_vcards == '999' ? __('Unlimited') : $plan->no_of_vcards }}
                                                {{ __('DigitalBizAds Cards') }}</span></li>

                                        {{-- <li><span>{{ $plan->no_of_galleries == '999' ? __('Unlimited') : $plan->no_of_galleries }}
                                        {{ __('Galleries') }}</span></li> --}}
                                        {{-- <li><span>{{ $plan->no_of_features == '999' ? __('Unlimited') : $plan->no_of_features }}
                                        {{ __('Card Features') }}</span></li>
                                <li><span>{{ $plan->no_of_payments == '999' ? __('Unlimited') : $plan->no_of_payments }}
                                        {{ __('Payment Listed') }}</span></li> --}}
                                        <li> <span>{{ $plan->personalized_link == '0' ? __('No') : '' }}
                                                {{ __('Personalized Link') }}
                                                {{ $plan->personalized_link == '1' ? __('Available') : '' }}</span></li>

                                        @if ($plan->is_whatsapp_store)
                                            <li> <span>
                                                    {{ __('Whatsapp Store Available') }}
                                                </span>
                                            </li>
                                            <li><span>{{ $plan->no_of_services == '999' ? __('Unlimited') : $plan->no_of_services }}
                                                    {{ __('Products') }}</span></li>
                                        @else
                                            <li> <span>
                                                    {{ __('Whatsapp Store is not Available') }}
                                                </span>
                                            </li>
                                        @endif
                                        <li> <span>{{ $plan->hide_branding == '0' ? __('No') : '' }}
                                                {{ __('Hide Branding') }}
                                                {{ $plan->hide_branding == '1' ? __('Available') : '' }}</span></li>


                                        @if (isset($plan->fearures))
                                            @php
                                                $planFeatures = json_decode($plan->fearures, true);
                                            @endphp

                                             {{-- @for ($i = 0; $i < count($planFeatures); $i++)
                                                <li>
                                                    <span>
                                                        {{ $planFeatures[$i] }}
                                                    </span>
                                                </li>
                                            @endfor --}}
                                        @endif
                                        {{-- <li><span>{{ $plan->free_setup == '0' ? __('No') : '' }} {{ __('Free Setup') }}
                                        {{ $plan->free_setup == '1' ? __('Available') : '' }}</span></li>
                                <li> <span>{{ $plan->free_support == '0' ? __('No') : '' }}
                                        {{ __('Free Support') }}
                                        {{ $plan->free_support == '1' ? __('Available') : '' }}</span></li> --}}

                                    </ul>
                                    <div class="text-center mt-4">
                                        @if ($free_plan == 0 || $plan->plan_price != '0')
                                            <a class="open-plan-model btn w-100" data-id="{{ $plan->plan_id }}"
                                                href="#openPlanModel">{{ __('Choose plan') }}</a>
                                        @else
                                            <a class="down-plan-model btn w-100" data-id="{{ $plan->plan_id }}"
                                                href="#downPlanModel">{{ __('Choose plan') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        @include('user.includes.footer')

        <div class="modal modal-blur fade" id="planModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Are you sure?') }}</div>
                        <div class="mb-2">{{ __('If you proceed, it will renew/upgrade your plan.') }}</div>
                        <div class="text-muted">
                            {{ __('If you upgrade or downgrade from your current plan, It will temporarily disable your old cards. You need to enable it manually.') }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <a class="btn btn-danger" id="plan_id">{{ __('Yes, proceed') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="downPlanModel" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title text-muted">{{ __('UNABLE TO DOWNGRADE') }}</div>
                        <div class="mb-2">{{ __("Because you are already activated the 'Free' plan.") }}</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-auto"
                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
