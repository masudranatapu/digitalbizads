@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

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
            <div class="row row-deck row-cards mb-5">
                {{-- Overall Income --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Overall Income') }}</div>
                            </div>
                            <div class="h1">{{ $currency->symbol }}{{ number_format($overall_income, 2) }}</div>
                        </div>
                    </div>
                </div>

                {{-- Today Income --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Today Income') }}</div>
                            </div>
                            <div class="h1">{{ $currency->symbol }}{{ number_format($today_income, 2) }}</div>
                        </div>
                    </div>
                </div>

                {{-- Overall Users --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Overall Users') }}</div>
                            </div>
                            <div class="h1">{{ $overall_users }}</div>
                        </div>
                    </div>
                </div>

                {{-- Today User --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Today Users') }}</div>
                            </div>
                            <div class="h1">{{ $today_users }}</div>
                        </div>
                    </div>
                </div>

                {{--  Sales Chart --}}
                <div class="col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-9">
                                        <h3>{{ __('Total Sales Overview') }}</h3>
                                    </div>
                                </div>
                                
                                <canvas id="sales"></canvas>
                              </div>
                        </div>
                    </div>
                </div>

                {{-- Users Chart --}}
                <div class="col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-9">
                                        <h3>{{ __('New Users Overview') }}</h3>
                                    </div>
                                </div>

                                <canvas id="users"></canvas>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
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

  const salesData = {
    labels: labels,
    datasets: [{
      label: `{{ __('Total Sales') }}`,
      backgroundColor: 'rgb(3, 90, 196)',
      borderColor: 'rgb(3, 90, 196)',
      data: [{{ $monthIncome }}],
    }]
  }; 

  const usersData = {
    labels: labels,
    datasets: [{
      label: `{{ __('New Users') }}`,
      backgroundColor: 'rgb(3, 90, 196)',
      borderColor: 'rgb(3, 90, 196)',
      data: [{{ $monthUsers }}],
    }]
  };
  

  const salesConfig = {
    type: 'line',
    data: salesData,
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
 
  const usersConfig = {
    type: 'bar',
    data: usersData,
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

  
  const salesChart = new Chart(document.getElementById('sales'),salesConfig);
  const usersChart = new Chart(document.getElementById('users'),usersConfig);

</script>
@endsection
@endsection
