@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/lightgallery.min.css') }}" />
<script src="{{ asset('backend/js/lightgallery.min.js') }}"></script>
<script src="{{ asset('backend/js/clipboard.min.js') }}"></script>
@endsection
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
                        {{ __('Media Library') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('user.add.media') }}" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            {{ __('Add Media') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards" id="captions">
                @if (!empty($media) && $media->count())
                @foreach ($media as $gallery)
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="d-block">
                            <div class="item card-img-top img-responsive img-responsive-16by9"
                                data-src="{{ asset($gallery->media_url) }}"
                                data-sub-html="<h4>{{ __('Media Name') }} : {{ $gallery->media_name }}</h4>"
                                style="background-image: url({{ asset($gallery->media_url) }})"></div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="font-weight-bold mb-2">{{ strlen($gallery->media_name) > 20 ?
                                        substr($gallery->media_name, 0, 20)."..." : $gallery->media_name }}</div>
                                    <div class="text-muted small"><small>
                                            {{ __('Upload on:') }}
                                            {{ $gallery->created_at->format('d-m-Y h:i A') }}
                                        </small></div>
                                </div>
                                <div class="ms-auto cursor-pointer">
                                    <a class="copyBoard" data-clipboard-text="{{ $gallery->media_url }}"
                                        title="{{ __('Copy') }}">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/copy -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="8" y="8" width="12" height="12" rx="2" />
                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="ms-auto cursor-pointer">
                                    <a onclick="deleteMedia('{{ $gallery->media_id }}')" title="{{ __('Delete') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-trash" width="44" height="44"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff4433" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="empty">
                    <div class="empty-img"><img src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}"
                            height="128" alt="">
                    </div>
                    <p class="empty-title">{{ __('No media found') }}</p>
                    <p class="empty-subtitle text-muted">
                        {{ __('Try adjusting your add to find what you are looking for.') }}
                    </p>
                </div>
                @endif

                <div class="col-lg-12">
                    {{-- Pagination --}}
                    {{ $media->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('user.includes.footer')
</div>

<div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">{{ __('Are you sure?')}}</div>
                <div>{{ __('If you proceed, you will enabled/disabled this card.')}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">{{
                    __('Cancel')}}</button>
                <a class="btn btn-danger" id="plan_id">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    "use strict";
    $('#captions').lightGallery({
        thumbnail:true,
        download: false,
        selector: '.item'
    });
    var clipboard = new ClipboardJS('.copyBoard');

    clipboard.on('success', function (e) {
      swal({
         title: `{{ __('Copied!') }}`,
         text: `{{ __('Image path was copied.') }}`,
         icon: "success",
         buttons: false,
         timer: 2000
         });
      });

    clipboard.on('error', function (e) {
        swal({
         title: `{{ __('Oops!') }}`,
         text: `{{ __('Something wrong.') }}`,
         icon: "error",
          buttons: false,
         timer: 2000
        });
    });


    function deleteMedia(mid){

        swal({
  title: "{{ __('Are you sure?') }}",
  text: "{{ __('Do you want to remove this file?') }}",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  window.location.href = "delete-media/"+mid;
  } else {
      //Nothing...
  }
});

    }
</script>
@endpush
