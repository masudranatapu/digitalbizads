<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Dashboard') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/themes') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.themes') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                    <circle cx="9" cy="10" r="2"></circle>
                                    <line x1="15" y1="8" x2="17" y2="8"></line>
                                    <line x1="15" y1="12" x2="17" y2="12"></line>
                                    <line x1="7" y1="16" x2="17" y2="16"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Themes') }}
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown {{ request()->is('admin/plans') || request()->is('admin/add-plan') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-businessplan" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <ellipse cx="16" cy="6" rx="5" ry="3"></ellipse>
                                    <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                    <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                    <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                    <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                    <path d="M5 15v1m0 -8v1"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Plans') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.plans') }}">
                                {{ __('All Plans') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.add.plan') }}">
                                {{ __('Add Plan') }}
                            </a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('admin/users') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.users') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Users') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/payment-methods') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.payment.methods') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-building-bank" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="21" x2="21" y2="21"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    <polyline points="5 6 12 3 19 6"></polyline>
                                    <line x1="4" y1="10" x2="4" y2="21"></line>
                                    <line x1="20" y1="10" x2="20" y2="21"></line>
                                    <line x1="8" y1="14" x2="8" y2="17"></line>
                                    <line x1="12" y1="14" x2="12" y2="17"></line>
                                    <line x1="16" y1="14" x2="16" y2="17"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Payment Methods') }}
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown {{ request()->is('admin/transactions') || request()->is('admin/offline-transactions') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <rect x="9" y="3" width="6" height="4" rx="2" />
                                    <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                    <path d="M12 17v1m0 -8v1" /></svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Transactions') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.transactions') }}"
                                class="dropdown-item">{{ __('Transactions') }}</a>
                            <a href="{{ route('admin.offline.transactions') }}"
                                class="dropdown-item">{{ __('Offline Transactions') }}</a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('admin/pages') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pages') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M19 18v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1" />
                                    <path d="M3 14h3m4.5 0h3m4.5 0h3" />
                                    <path d="M5 10v-5a2 2 0 0 1 2 -2h7l5 5v2" /></svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Pages') }}
                            </span>
                        </a>
                    </li>

                    <li
                        class="nav-item dropdown {{ request()->is('admin/settings') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Settings') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.settings') }}"
                                class="dropdown-item">{{ __('General Settings') }}</a>
                            <a href="{{ url('languages') }}" target="_blank" class="dropdown-item">{{ __('Translations')
                                }}</a>
                            <a href="{{ route('admin.generate.sitemap') }}"
                                class="dropdown-item">{{ __('Generate Sitemap') }}</a>
                            <a href="{{ route('admin.tax.setting') }}"
                                class="dropdown-item">{{ __('Invoice & Tax') }}</a>
                            <a href="{{ route('admin.check') }}"
                                class="dropdown-item">{{ __('Check Update') }}</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
