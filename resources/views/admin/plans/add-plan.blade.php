@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

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
                            {{ __('Add Plan') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form action="{{ route('admin.save.plan') }}" method="post" class="card">
                            @csrf
                            <div class="card-header">
                                <h4 class="page-title">{{ __('Plan Details') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            {{-- Recommended --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Recommended') }}</div>
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="recommended">
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- Private Plan --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Private Plan') }}</div>
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="is_private">
                                                    </label>
                                                    <small
                                                        class="text-muted">{{ __('This plan does not show on the customer page. Only the admin panel can assign this plan to the customer.') }}
                                                    </small>
                                                </div>
                                            </div>
                                            {{-- Plan Name --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Plan Name') }}</label>
                                                    <input type="text" class="form-control" name="plan_name"
                                                        placeholder="{{ __('Plan Name') }}..." required>
                                                </div>
                                            </div>
                                            {{-- Description --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Description') }}</label>
                                                    <textarea class="form-control" name="plan_description" rows="3" placeholder="{{ __('Description') }}.." required></textarea>

                                                </div>
                                            </div>
                                            <h2 class="page-title my-3">
                                                {{ __('Plan Prices') }}
                                            </h2>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Price') }}</label>
                                                    <input type="number" class="form-control" name="plan_price"
                                                        min="0" step="0.01" placeholder="{{ __('Price') }}..."
                                                        required>
                                                    <small class="text-muted">{{ __('For free, enter 0') }} </small>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Validity') }}</label>
                                                    <input type="number" class="form-control" name="validity"
                                                        min="1" max="9999" placeholder="{{ __('Validity') }}..."
                                                        value="{{ $config[8]->config_value == 'monthly' ? 31 : 365 }}"
                                                        required>
                                                    <small class="text-muted">{{ __('For forever, enter 9999') }} </small>
                                                </div>
                                            </div>

                                            <h2 class="page-title my-3">
                                                {{ __('Plan Features') }}
                                            </h2>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('No. Of vCards') }}</label>
                                                    <input type="number" class="form-control" name="no_of_vcards"
                                                        min="1" max="999"
                                                        placeholder="{{ __('No. Of vCards') }}..." value="1" required>
                                                    <small class="text-muted">{{ __('For unlimited, enter 999') }} </small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label
                                                        class="form-label required">{{ __('No. Of Services/Products') }}</label>
                                                    <input type="number" class="form-control" name="no_of_services"
                                                        min="1" max="999"
                                                        placeholder="{{ __('No. Of Services/Products') }}..."
                                                        value="1" required>
                                                    <small class="text-muted">{{ __('For unlimited, enter 999') }} </small>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('No. Of Galleries') }}</label>
                                                    <input type="number" class="form-control" name="no_of_galleries"
                                                        min="1" max="999"
                                                        placeholder="{{ __('No. Of Galleries') }}..." value="1"
                                                        required>
                                                    <small class="text-muted">{{ __('For unlimited, enter 999') }}
                                                    </small>
                                                </div>
                                            </div>
                                             <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('No. Of Card Features') }}</label>
                                                <input type="number" class="form-control" name="no_of_features" min="1" max="999"
                                                    placeholder="{{ __('No. Of Card Features') }}..." value="1"
                                                    required>
                                                <small class="text-muted">{{ __('For unlimited, enter 999') }} </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('No. Of Payment Listed') }}</label>
                                                <input type="number" class="form-control" name="no_of_payments" min="1" max="999"
                                                    placeholder="{{ __('No. Of Payment Listed') }}..." value="1"
                                                    required>
                                                <small class="text-muted">{{ __('For unlimited, enter 999') }} </small>
                                            </div>
                                        </div> --}}
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Personalized Link') }}</div>
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="personalized_link">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Hide Branding') }}</div>
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="hide_branding">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('What\'s App Store') }}</div>
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="is_whatsapp_store">
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Free Setup') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="free_setup">
                                                </label>
                                            </div>
                                        </div> --}}
                                            {{-- <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Free Support') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="free_support">
                                                </label>
                                            </div>
                                        </div> --}}
                                            <div class="col-md-4 col-xl-4 my-3">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-plus" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19"></line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12"></line>
                                                        </svg>
                                                        {{ __('Add') }}
                                                    </button>
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
        @include('admin.includes.footer')
    </div>
@endsection
