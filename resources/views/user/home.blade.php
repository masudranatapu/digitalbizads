@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="row row-deck row-cards">
                        {{-- Current plan --}}
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="subheader">{{ __('Current Plan') }}</div>
                                    </div>
                                    @if ($active_plan->plan_price == 0)
                                    <div class="h1">{{ __($active_plan->plan_name) }}</div>
                                    <p>{{ __('FREE PLAN') }}</p>
                                    @else
                                    <p class="text-uppercase"><b>{{ __($active_plan->plan_name) }}</b></p>
                                    @endif
                                    <a class="btn btn-sm btn-white" href="{{ route('user.plans') }}">
                                        {{ __('Show details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
        
                        {{-- Business cards --}}
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="subheader">{{ __('Business Cards') }}</div>
                                    </div>
                                    <div class="h1">{{ $business_card == 999 ? __('Unlimited') : $business_card }}</div>
                                    <a class="btn btn-sm btn-white" href="{{ route('user.cards') }}">
                                        {{ __('Show details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
        
                        {{-- Remaining datas --}}
                        <div class="col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="subheader">{{ __('Remaining Days') }}</div>
                                    </div>
        
                                    @if ($active_plan->validity == 9999)
                                    <p class="h1">{{ __('Lifetime') }}</p>
                                    @else
                                    <p class="h1">{{ $remaining_days > 0 ?  $remaining_days : __('Plan Expired!') }}</p>
                                    @endif
        
                                    <a class="btn btn-sm btn-white" href="{{ route('user.plans') }}">
                                        {{ __('Show details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="row row-deck row-cards">
                        {{--  Businesscard Chart --}}
                        <div class="col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-9">
                                                <h3>{{ __('Total Business Cards Overview') }}</h3>
                                            </div>
                                        </div>
                                        
                                        <canvas id="businessCards"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @include('user.includes.footer')
</div>

{{-- Custom JS --}}
@section('scripts')
<script>
"use strict";
  const labels = [
    `{{ __('Jan') }}`,
    `{{ __('Feb') }}`,
    `{{ __('Mar') }}`,
    `{{ __('Apr') }}`,
    `{{ __('May') }}`,
    `{{ __('Jun') }}`,
    `{{ __('Jul') }}`,
    `{{ __('Aug') }}`,
    `{{ __('Sep') }}`,
    `{{ __('Oct') }}`,
    `{{ __('Nov') }}`,
    `{{ __('Dec') }}`,
  ];

  const businessCardsData = {
    labels: labels,
    datasets: [{
      label: `{{ __('Total Cards') }}`,
      backgroundColor: 'rgb(3, 90, 196)',
      borderColor: 'rgb(3, 90, 196)',
      data: [{{ $monthCards }}],
    }]
  };
  
  const businessCardsConfig = {
    type: 'line',
    data: businessCardsData,
    options: {
        animation: true,
        plugins: {
            legend: {
                labels: {
                    font: {
                        weight: 600
                    }
                }
            }
        }
    }
  };
  
  const businessCardsChart = new Chart(document.getElementById('businessCards'),businessCardsConfig);

</script>
@endsection
@endsection
