<section>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm bg-body-tertiary py-4 px-2"
        style="@if ($business_card_details->header_backgroung) background-color: {{ $business_card_details->header_backgroung }} @endif !important; @if ($business_card_details->header_text_color) color: {{ $business_card_details->header_text_color }} @endif !important">
        <div class="container-fluid d-flex justify-content-between">
            <div @if ($business_card_details->header_text_color) color: {{ $business_card_details->header_text_color }} @endif>
                <a class="navbar-brand" href="{{ route('card.preview', $business_card_details->card_url) }}">
                    @if ($business_card_details->profile)
                        <img src="{{ url('/') }}{{ $business_card_details->profile }}"
                            alt="{{ $business_card_details->title }}" width="40px">
                    @else
                        <span
                            style="font-weight: 600; @if ($business_card_details->header_text_color) color: {{ $business_card_details->header_text_color }} @endif !important">
                            {{ $business_card_details->title }}</span>
                    @endif
                </a>
            </div>
            <a href="{{ route('cart', ['cardUrl' => $business_card_details->card_url]) }}" class="nav-link">
                <span class="cart">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="@if ($business_card_details->header_text_color) {{ $business_card_details->header_text_color }} @else #000000 @endif ">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span
                        class="position-absolute top-40 start-25 translate-middle badge rounded-circle bg-danger cartCounter">
                        @if (session()->has('cart'))
                            {{ count(session()->get('cart')) }}
                        @else
                            <span>0</span>
                        @endif
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </span>
            </a>
        </div>
    </nav>
</section>
