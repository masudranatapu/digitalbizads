<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('user/dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Dashboard') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('user/cards') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.cards') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon icon-tabler icon-tabler-id" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="16" rx="3">
                                    </rect>
                                    <circle cx="9" cy="10" r="2"></circle>
                                    <line x1="15" y1="8" x2="17" y2="8"></line>
                                    <line x1="15" y1="12" x2="17" y2="12"></line>
                                    <line x1="7" y1="16" x2="17" y2="16"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Biz Ad') }}
                            </span>
                        </a>
                    </li>

                    @php
                        $userPlan = getUserPlan();
                        $store = getUserStore();
                        
                    @endphp
                    @if (isset($userPlan['is_whatsapp_store']) && $userPlan['is_whatsapp_store'] == '1')
                        <li class="nav-item dropdown @yield('store-nav')">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#navbar-extra"
                                role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg class="icon icon-tabler icon-tabler-id" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="4" width="18" height="16"
                                            rx="3">
                                        </rect>
                                        <circle cx="9" cy="10" r="2"></circle>
                                        <line x1="15" y1="8" x2="17" y2="8"></line>
                                        <line x1="15" y1="12" x2="17" y2="12"></line>
                                        <line x1="7" y1="16" x2="17" y2="16"></line>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    {{ __('Store') }}
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ request()->routeIs('user.stores') ? 'active' : '' }}"
                                    href="{{ route('user.stores') }}">{{ __('Store List') }}</a>
                                <a class="dropdown-item {{ request()->routeIs('user.product.category.index') ? 'active' : '' }}"
                                    href="{{ route('user.product.category.index') }}">{{ __('Product Category') }}</a>
                                @if (isset($store))
                                    <a class="dropdown-item {{ request()->routeIs('user.products.*') || request()->routeIs('user.product.variants*') ? 'active' : '' }}"
                                        href="{{ route('user.products.list', ['id' => $store->card_id]) }}">{{ __('Product List') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('user.order.*') ? 'active' : '' }}"
                                        href="{{ route('user.order.index', ['card_id' => $store->card_id]) }}">Order</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item {{ request()->is('user/media') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.media') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg class="icon icon-tabler icon-tabler-photo" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="15" y1="8" x2="15.01" y2="8"></line>
                                        <rect x="4" y="4" width="16" height="16"
                                            rx="3">
                                        </rect>
                                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    {{ __('Media') }}
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item {{ request()->is('user/plans') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.plans') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon icon-tabler icon-tabler-id" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="16"
                                        rx="3"></rect>
                                    <circle cx="9" cy="10" r="2"></circle>
                                    <line x1="15" y1="8" x2="17" y2="8"></line>
                                    <line x1="15" y1="12" x2="17" y2="12"></line>
                                    <line x1="7" y1="16" x2="17" y2="16"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Plans') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('user/transactions') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.transactions') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <rect x="9" y="3" width="6" height="4"
                                        rx="2" />
                                    <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                    <path d="M12 17v1m0 -8v1" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Transactions') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown @yield('setting-nav')">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#navbar-extra"
                            role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="16"
                                        rx="3">
                                    </rect>
                                    <circle cx="9" cy="10" r="2"></circle>
                                    <line x1="15" y1="8" x2="17" y2="8"></line>
                                    <line x1="15" y1="12" x2="17" y2="12"></line>
                                    <line x1="7" y1="16" x2="17" y2="16"></line>
                                </svg> --}}

                                <i class="fa-solid fa-sliders"></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Settings') }}
                            </span>
                        </a>
                        <div class="dropdown-menu ">
                            <a class="dropdown-item @if (request()->routeIs('user.setting.payment')) active @endif"
                                href="{{ route('user.setting.payment') }}">{{ __('Payment Settings') }}</a>

                            <a class="dropdown-item @if (request()->routeIs('user.state*')) active @endif"
                                href="{{ route('user.state.index') }}">{{ __('Sate & Tax') }}</a>

                            <a class="dropdown-item @if (request()->routeIs('user.shipping_area*')) active @endif"
                                href="{{ route('user.shipping_area.index') }}">{{ __('Shipping Area & cost') }}</a>
                        </div>
                    </li>

                    {{-- Additional Tools --}}
                    {{-- <li class="nav-item dropdown {{ request()->is('user/tools*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4"></path>
                                    <line x1="14.5" y1="5.5" x2="18.5" y2="9.5"></line>
                                    <polyline points="12 8 7 3 3 7 8 12"></polyline>
                                    <line x1="7" y1="8" x2="5.5" y2="9.5"></line>
                                    <polyline points="16 12 21 17 17 21 12 16"></polyline>
                                    <line x1="16" y1="17" x2="14.5" y2="18.5"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Addtional Tools') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('user.qr-maker') }}">
                                {{ __('QR Maker') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.whois-lookup') }}">
                                {{ __('Whois Lookup') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.dns-lookup') }}">
                                {{ __('DNS Lookup') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.ip-lookup') }}">
                                {{ __('IP Lookup') }}
                            </a>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
