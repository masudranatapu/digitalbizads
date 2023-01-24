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
                        {{ __('QR Maker') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">

                                <div class="mb-3 col-lg-4">
                                    <div class="form-label">{{ __('QR Style') }}</div>
                                    <select id="mode" class="form-select" onchange="updateQr()">
                                        <option disabled selected>{{ __('Choose Option') }}</option>
                                        <option value="0">{{ __('Basic') }}</option>
                                        <option value="2">{{ __('Text Style 1') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3 font col-lg-4">
                                    <div class="form-label">{{ __('Font Style') }}</div>
                                    <select id="font" class="form-select" onchange="updateQr()">
                                        <option value="courier">{{ __('Courier') }}</option>
                                        <option value="verdana">{{ __('Verdana') }}</option>
                                        <option value="georgia">{{ __('Georgia') }}</option>
                                        <option value="sans-serif">{{ __('Sans Serif') }}</option>
                                        <option value="serif">{{ __('Serif') }}</option>
                                        <option value="monospace">{{ __('Monospace') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3 qrtext col-lg-4">
                                    <label class="form-label">{{ __('QR Text') }}</label>
                                    <input type="text" id="qrtext" onkeyup="updateQr()" class="form-control"
                                        name="example-text-input" placeholder="{{ __('Input placeholder') }}">
                                </div>
                            </div>

                            <div class="row">

                                <div class="mb-3 textlabel col-lg-4">
                                    <label class="form-label">{{ __('Label') }}</label>
                                    <input type="text" id="textlabel" onkeyup="updateQr()" class="form-control"
                                        name="example-text-input" placeholder="{{ __('Input placeholder') }}">
                                </div>

                                <div class="mb-3 textColor col-lg-4">
                                    <label class="form-label">{{ __('Text Color') }}</label>
                                    <input type="color" id="textColor" oninput="updateQr()"
                                        class="form-control form-control-color" value="#000000"
                                        title="Choose your color">
                                </div>

                                <div class="mb-3 fill col-lg-4">
                                    <label class="form-label">{{ __('Fill Color') }}</label>
                                    <input type="color" id="fill" oninput="updateQr()"
                                        class="form-control form-control-color" value="#000000"
                                        title="Choose your color">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 bg col-lg-4">
                                    <label class="form-label">{{ __('Background Color') }}</label>
                                    <input type="color" id="bg" oninput="updateQr()"
                                        class="form-control form-control-color" value="#ffffff"
                                        title="Choose your color">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ __('QR Image') }}</h3>
                            <div class="col-lg-12 align-items-center text-center">
                                <div class="qr-code"></div>
                                <button id="download" onclick="downloadQr()" class="btn mt-3 btn-primary">{{
                                    __('Download QR') }}</button>
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
@push('custom-js')
<script>
    $(".font").hide();
$(".qrtext").hide();
$(".textlabel").hide();
$(".textColor").hide();
$(".fill").hide();
$(".bg").hide();
$(".choosedImage").hide();
$("#download").hide();

function downloadQr(){
    var imgData = $(".qr-code").children().attr("src");
    var a = document.createElement("a");
    a.href = imgData;
    a.download = "qr.png";
    a.click();
}

function updateQr() {
var mode = $("#mode").val();
var font = $("#font").val();
var qrtext = $("#qrtext").val();
var textlabel = $("#textlabel").val();
var textColor = $("#textColor").val();
var fill = $("#fill").val();
var bg = $("#bg").val();
$("#download").show();

normalParams ={
    mode: Number(mode),
    ecLevel:'H',
    text: qrtext,
    render:'image',
    fill: fill,
    background: bg,
};

textParams = {
    mode: Number(mode),
    text: qrtext,
    ecLevel:'H',
    render:'image',
    label: textlabel,
    fontname: font,
    fontcolor: textColor,
    fill: fill,
    background: bg
};

$(".qr-code").html("");
var qrparams = "";

if(mode == "0"){
    // Show All
    $(".font").hide();
    $(".qrtext").hide();
    $(".textlabel").hide();
    $(".textColor").hide();
    $(".fill").hide();
    $(".bg").hide();
    $(".choosedImage").hide();
    $(".qrtext").show();
    $(".fill").show();
    $(".bg").show();

    qrparams = normalParams;
}

if(mode == "2"){
    // Show All
    $(".font").hide();
    $(".qrtext").hide();
    $(".textlabel").hide();
    $(".textColor").hide();
    $(".fill").hide();
    $(".bg").hide();
    $(".choosedImage").hide();
    $(".qrtext").show();
    $(".textlabel").show();
    $(".font").show();
    $(".textColor").show();
    $(".fill").show();
    $(".bg").show();
    qrparams = textParams;
}
$(".qr-code").qrcode(qrparams);
}
</script>
@endpush
</div>
@endsection