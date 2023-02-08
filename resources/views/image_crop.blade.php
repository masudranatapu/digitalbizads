
@push('custom_css')
<style>
    @media only screen and (min-width: 960px) {
        .img-crop-modal {
            max-width: 650px!important;
        }
        .img-crop-modal .modal-body {
            padding-top: 15px!important;
        }
    }
    @media only screen and (max-device-width: 480px) {
    }

</style>

@endpush

<div id="uploadimageModal" class="modal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered img-crop-modal">
        <div class="modal-content">
            <div class="modal-body img-crop-modal-body">
                <div id="image_demo" style="margin-top:30px"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">
                    <i class="loading-spinner fa-lg fas fa-spinner fa-spin"></i>
                    <span class="btn-txt">{{ __('Crop & Upload Image') }}</span>
                </button>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ __('Close')}}</button>
            </div>
        </div>
    </div>
</div>

<div id="uploadlogoModal" class="modal" role="dialog" data-keyboard="false" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                          <div id="logo_demo" style="margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_logo">
                    <i class="loading-spinner fa-lg fas fa-spinner fa-spin"></i>
                    <span class="btn-txt">{{ __('Crop & Upload logo') }}</span>
                </button>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">{{ __('Close')}}</button>
            </div>
        </div>
    </div>
</div>



<script>
//PHOTO CROPING
$(document).ready(function(){
    $logo_crop = $('#logo_demo').croppie({
        enableExif: true,
        showZoomer: true,
        viewport: {
            width:350,
            height:120,
            type:'square' //circle
        },
        boundary:{
            width:250,
            height:250
        }
    });



    @if(isMobile())

    var boundaryWidth = 700;

    @else

    var boundaryWidth = 500;

    @endif

    var boundaryHeight = boundaryWidth / 1;
    var viewportWidth = boundaryWidth - (boundaryWidth/100*25);
    var viewportHeight = boundaryHeight - (boundaryHeight/100*25);

    $image_crop = $('#image_demo').croppie({

        enableExif: true,

        showZoomer: true,

         viewport: {
            width:300,
            height:500,
            type:'square' //circle
        },
        boundary:{
            width:350,
            height:350
        }
    });

});


$(document).on('change', '#logo', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
        $logo_crop.croppie('bind', {
            url: event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('.loading-spinner').removeClass('active');
    $('#uploadlogoModal').modal('show');
});

$(document).on('click', '.crop_logo', function(event){
    var upload_logo_url = $('#upload_logo_url').val();
    var _this = this;
    $logo_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response){
        $.ajax({
            url: upload_logo_url,
            type: "POST",
            data:{"image": response,"_token": "{{ csrf_token() }}",},
            beforeSend: function () {
                $("body").css("cursor", "progress");
                $(_this).children(".loading-spinner").toggleClass('active');
                $(_this).attr("disabled", true);
                $(_this).children(".btn-txt").text("Croping & Uploading logo");
            },
            success:function(data)
            {
                $(_this).attr("disabled", false);
                $(_this).children(".loading-spinner").removeClass('active');
                $(_this).children(".btn-txt").text("Crop & Upload logo");
                $('#logofield1').html(data.html);
                $('#previewLogo').attr('src', data.logo);
                $('#uploadlogoModal').modal('hide');
                $('#upload_logo').val(1);
            },
            error: function (jqXHR, exception) {
                $(_this).attr("disabled", false);
                $(_this).children(".loading-spinner").removeClass('active');
                $(_this).children(".btn-txt").text("Crop & Upload logo");
                // toastr.error('Something wrong ! Please try again');
            },
            complete: function (response) {
                $(_this).attr("disabled", false);
                $(_this).children(".loading-spinner").removeClass('active');
                $(_this).children(".btn-txt").text("Crop & Upload logo");
                $("body").css("cursor", "default");
            }
        });
    })
});


$(document).on('change', '#banner', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
});

$(document).on('click', '.crop_image', function(event){
    var upload_image_url = $('#upload_image_url').val();
    var _this = this;
    $image_crop.croppie('result', {
        type: 'canvas',
        size: { width: 500, height: 700 }
    }).then(function(response){
        $.ajax({
            url: upload_image_url,
            type: "POST",
            beforeSend: function () {
                $("body").css("cursor", "progress");
                $(_this).children(".loading-spinner").toggleClass('active');
                $(_this).attr("disabled", true);
                $(_this).children(".btn-txt").text("Croping & Uploading image");
            },
            data:{
                "image": response,
                "_token": "{{ csrf_token() }}",
            },
            success:function(data)
            {
                $(_this).attr("disabled", false);
                $(_this).children(".loading-spinner").removeClass('active');
                $(_this).children(".btn-txt").text("Crop & Upload image");
                $('#uploadimageModal').modal('hide');
                $('#galleryfield1').html(data.html);
                $('#digitalbizSlider').html('');
                $("#digitalbizSlider").append('<img src="' + data.banner +'" class="d-block w-100"/>');
                $('#upload_image').val(1);

            },
            error: function (jqXHR, exception) {
                $(_this).attr("disabled", false);
                $(_this).children(".loading-spinner").removeClass('active');
                $(_this).children(".btn-txt").text("Crop & Upload image");
                toastr.error('Something wrong ! Please try again');
            },
            complete: function (response) {
                $(_this).attr("disabled", false);
                $(_this).children(".btn-txt").text("Crop & Upload image");
                $(_this).children(".loading-spinner").removeClass('active');
                $("body").css("cursor", "default");

            }
        });
    })
});


</script>
