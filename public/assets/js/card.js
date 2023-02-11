
$(document).on('keyup','.cin', function() {
    var cin = $(this).val();
    var preview = $(this).data('preview');

    var concat_cls = $(this).data('concat');
    if( undefined != concat_cls){
        var cin = getFullStr(concat_cls);
    }

    $('#'+preview).text(cin);
}).keyup();

$(document).on('keyup','.mcin', function() {
    var mcin = $(this).val();
    var id = $(this).data('id');
    var preview = $(this).data('preview');
    var class1 = '.sicon_'+id+' .'+preview;
    $(class1).text(mcin);
}).keyup();



$(document).on('keyup','.cin_desig_comp',function(){
    var desig = $("input[name=designation]").val();
    var comp = $("input[name=company_name]").val();
    if(desig != '' && comp != ''){
        $('#desig_comp_show').text(desig +' at '+ comp);
    }else{
        $('#desig_comp_show').text(desig +' '+ comp);
    }
})


function getFullStr(concat_cls){
    var cin = '';
    $('.'+concat_cls).each(function(e) { cin = cin + ' '+ $(this).val();});
    return  cin;
}

//  Video Section
function addVideoSection() {
    let video = '<div class="sec_divider custome_sec"><div class="col-12"><div class="form-floating mb-2"><input type="text" class="form-control video_title" name="video_title[]" placeholder="Title Name"><label for="title">Title</label></div></div><div class="col-12"><div class="form-floating"><select class="form-select video_type" name="video_type[]" aria-label="Floating label select example"><option value="link">Link</option><option value="file">File (Maximum 5mb)</option></select><label >Type</label></div></div><div class="col-12"><div class="form-floating mb-2"><input type="text" class="form-control video_file" name="video_file[]"  placeholder="Video"><label for="video_file">Video</label></div></div><div class="col-12"><div class="form-floating"><textarea class="form-control video_description" name="video_description[]" placeholder="Leave a comment here" style="height: 100px"></textarea><label for="video_description">Description</label></div></div><a href="javascript:void(0)" class="btn btn-danger btn-sm removeVideoSection"><i class="fa fa-times" aria-hidden="true"></i></a></div>';

    $("#showVideo").append(video).html();
}

$('body').on('click', '.removeVideoSection', function() {
    $(this).parent('div.custome_sec').remove()
});


//  Testimonial Section
function addTestimonial() {
    let testimonial = "<div class='custome_sec mt-3'><div class='col-12 mb-2'><div class='form-floating'><textarea class='form-control testimonial_content' name='testimonial_content[]' placeholder='Leave a comment here' style='height: 100px'></textarea><label for='content'>Content</label></div></div><div class='col-12 mb-2'><div class='form-floating'><input type='text' class='form-control testimonial_name' name='testimonial_name[]'  placeholder='Name'><label for='name'>Name</label></div></div><a href='javascript:void(0)' class='btn btn-danger btn-sm removeTestimonial'><i class='fa fa-times' aria-hidden='true'></i></a></div>";
    $("#showTestimonial").append(testimonial).html();
}

$('body').on('click', '.removeTestimonial', function() {
    $(this).parent('div.custome_sec').remove()
});


$(document).on('keyup','.input_sicon', function() {
    var cin = $(this).val();
    var preview = $(this).data('preview');
    $('.sicon').hide();
    var html = '';

    $('.input_sicon').each(function(e) {
        var val = $(this).val();
        var icon_name = $(this).data('icon_name');
        var icon_fa = $(this).data('icon_fa');
        var icon_title = $(this).data('icon_title');

        if(val != ''){
            html += '<div class="col-3" style=""><div class="icon"><a href="'+val+'" target="_blank" class="sicon_facebook_url"><i class="'+icon_fa+'"></i><span>'+icon_title+'</span></a></div></div>';
        }
    });
    $('#sicon_preview_div').html(html);

}).keyup();

$(document).on('click','.social_icon', function() {
    var example_text = $(this).data('example_text');
    var icon_fa = $(this).data('icon_fa');
    var icon_name = $(this).data('icon_name');
    var icon_title = $(this).data('icon_title');

    var html = '<div class="col-12 sicon_'+icon_name+' drag-handler"><div class="input-group mb-2"><span class="input-group-text"><i class="fa fa-bars text-default" aria-hidden="true"></i><i class="'+icon_fa+'"></i></span><input type="text" class="form-control input_sicon" data-icon_name="'+icon_name+'" data-icon_fa="'+icon_fa+'" data-icon_title="'+icon_title+'"  name="'+icon_name+'[]" placeholder="'+example_text+'"><span class="input-group-text"><i class="fa fa-times text-default remove_sicon" data-delclass="'+icon_name+'" aria-hidden="true"></i></span></div></div>';
    $('#social-media').append(html);

})

$(document).on('keyup','.testimonial_content, .testimonial_name', function(e){
    $('.testimonial_sec_child').trigger('destroy.owl.carousel');
    var arr_cont = $('.testimonial_content').map((i, e) => e.value).get();
    var arr_name = $('.testimonial_name').map((k, l) => l.value).get();
    var html = '';
    for ( var i = 0, l = arr_cont.length; i < l; i++ ) {
        html += '<div class="item"><div class="content"><p>'+arr_cont[i]+'</p><h3>'+arr_name[i]+'</h3></div></div>';
    }

    $('.testimonial_sec_child').html(html).owlCarousel({
        loop:true,margin:10,nav:false,dots:true,responsive:{0:{items:1 }}
    });
})

$(document).on('keyup change','.video_title, .video_type, .video_file, .video_description', function(e){
    $('.video_sec').addClass("video_sec_");
    var arr_video_title = $('.video_title').map((i, e) => e.value).get();
    var arr_video_type = $('.video_type').map((k, l) => l.value).get();
    var arr_video_file = $('.video_file').map((m, n) => n.value).get();
    var arr_video_src = $('.video_src').map((m, n) => n.value).get();
    var arr_video_description = $('.video_description').map((x, y) => y.value).get();
    var html = '';
    var video_tag = '';
    for ( var i = 0, l = arr_video_title.length; i < l; i++ ) {
        file = '';
        if(arr_video_type[i] == 'link'){
            var youtube_url = arr_video_file[i];//https://www.youtube.com/watch?v=jxF2dL4MC5Q&ab_channel=JamunaTV
            var remove_after = youtube_url.split('&')[0];//remove &ab_channel=JamunaTV
            var _file = remove_after.split("v=").pop(); //jxF2dL4MC5Q
            if(_file){
                file = _file;
            }
            else{
                file = arr_video_file[i].split("/").pop();
            }
            video_tag = '<iframe src="https://www.youtube.com/embed/'+file+'" title="" frameborder="0" allow="accelerometer; encrypted-media; gyroscope;" allowfullscreen></iframe>';

        }else{
            file = arr_video_src[i];
            console.log(arr_video_src[i]);
            video_tag = '<video height="200" src="'+file+'" width="100%" class="video-preview" controls="controls"/>';
        }
        html += '<div class="video_sec_child mb-4"><div class="video_content"><div class="title"><h3>'+arr_video_title[i]+'</h3></div><div class="video mb-3 ">'+video_tag+'</div><div class="video_description">'+arr_video_description[i]+'</div></div></div>';
    }
    $('.video_content').html(html);

})

$(document).on('click','.video_sec_child_delete', function(e){
    var route = $(this).data('route');
    var index = $(this).data('index');
    if (confirm("Are you sure?")) {
        $.ajax({
            type: 'get',
            url: route,
            async: true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (response) {
                if(response.status == 'success'){
                    $('.video_sec_'+index).remove();
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }
})

$(document).on('click','.testimonial_sec_delete', function(e){
    var route = $(this).data('route');
    var index = $(this).data('index');
    if (confirm("Are you sure?")) {
        $.ajax({
            type: 'get',
            url: route,
            async: true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (response) {
                if(response.status == 'success'){
                    $(".testimonial_sec_child").trigger('remove.owl.carousel', [index]).trigger('refresh.owl.carousel');
                    $('.testimonial_sec_'+index).remove();
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }
})





$(document).ready(function () {

    // $('#cardCreateFrom').validate({
    //     submitHandler: function(form) {
    //         $('.save-card-spinner').addClass('active');
    //         $(this).find('.save-card').prop('disabled', true);
    //         $(".btn-txt").text("Processing ...");
    //         setTimeout(function(){
    //             $(".save-card-spinner").removeClass("active");
    //             $('.save-card').attr("disabled", false);
    //             $(".btn-txt").text("Save");
    //         }, 50000);
    //         form.submit();
    //       }
    // });

});




$(document).on('click','.section_del',function(e){
    var delid = $(this).data('delid');
    var delshow = $(this).data('delshow');
    $('.'+delid).remove();
    $('.'+delshow).remove();
})

$(document).on('click','.remove_sicon',function(e){
    var delclass = $(this).data('delclass');
    $(this).closest('.sicon_'+delclass).remove();
})



// $(document).on('input','#personalized_link', function() {
//     var get_url = $('#base_url').val();
//     var minLength = 2;
//     var maxLength = 100;
//     var value = $(this).val().replace(/[^A-Z0-9]/gi,'');
//     $('#personalized_link').val(value);
//     $("#personalized_link_help").addClass('text-danger');
//     if(value.length == 0){ $("#personalized_link_help").text(''); return false;}

//     if (value.length < minLength){
//         $("#personalized_link_help").text("Text is short");
//     }
//     else if (value.length > maxLength)
//     {
//         $("#personalized_link_help").text("Text is long");
//     }else{
//         $.ajax({
//             type: 'POST',
//             url: get_url + '/card/check_link/'+value,
//             async: true,
//             beforeSend: function () {
//                 $("body").css("cursor", "progress");
//             },
//             success: function (response) {
//                 $("#personalized_link_help").text(response.message).removeClass('text-danger').addClass('text-success');

//             },
//             complete: function (data) {
//                 $("body").css("cursor", "default");
//             }
//         });
//     }

// }).keyup();

//icon search
$(document).on('input', '#filter', function(){
    var filter = $(this).val(), count = 0;
    $(".add_list_wrap .icon_each").each(function(){
        if ($(this).data('name').search(new RegExp(filter, "i")) < 0) {
            $(this).fadeOut();
        } else {
            $(this).show();
            count++;
        }
    });
    $("#filter-count").text('('+count+')');

});

// social content modal
$(document).on('click', '.onclickIcon' ,function() {
    var name = $(this).data('name');
    var color = $(this).data('color');
    var type = $(this).data('type');
    var title = $(this).data('title');
    var image = $(this).data('image');
    var id = $(this).data('id');
    var ftitle = '';
    var html = '<li class="sicon_'+id+'"><a class="social_link" href="" target="_blank"><img style="background:'+color+'" src="'+image+'" alt="email" class="social_logo"><span class="icon_label link_title_show">'+title+'</span></a></li>';
    $('.social_icon ul').append(html);

    $('#content_icon').attr('src',image);
    if(type == 'username'){
        ftitle = title+ ' username';
    }else if(type == 'link'){
        ftitle = title+ ' profile link';
    }else if(type == 'mail'){
        ftitle = title+ ' address';
    }else{
        ftitle = title;
    }
    if(type != 'link'){
        $('.content_input').addClass('remove_slash');
    }else{
        $('.content_input').removeClass('remove_slash');
    }
    $('#content_link').text(ftitle);
    $("input[name='content']").attr('placeholder',ftitle);

    $('#content_title').val(title);
    $('#content_title').attr('data-id', id);
    $('.first_modal').addClass('d-none');
    $('.second_modal').removeClass('d-none');
});


// $(document).on('input','.remove_slash',function(){
//     var str = $(this).val();
//     var newstr = str.replace(/(\\|\/)+/ig, '');
//     var newstr = newstr.replace('www.', '');
//     $(this).val(newstr);

// })

//card_url validation
/*
$(document).on('input','#card_url', function() {
    var get_url = $('#base_url').val();
    var mode = $('input[name="mode"]').val();
    var id = $('input[name="id"]').val();
    var minLength = 2;
    var maxLength = 124;
    var value = $(this).val().replace(/[^A-Z0-9]/gi,'');
    $('#card_url').val(value);
    $("#card_url_help").addClass('text-danger');

    if( (value.length > minLength) && (value.length < maxLength) ){

        $.ajax({
            type: 'get',
            url: get_url + '/user/card/check_link/'+value,
            data:{mode,id},
            async: true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (response) {
                $("#card_url_help").html(response.message);
                if(response.status == false){
                    $("#card_url_help").removeClass('text-success').addClass('text-danger');
                    $('.save-card').attr('disabled','disabled');
                }
                if(response.status == true){
                    $("#card_url_help").removeClass('text-danger').addClass('text-success');
                    $('.save-card').removeAttr('disabled');
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }else{
        $("#card_url_help").text('');
    }

}).keyup();

*/




$(document).ready(function () {

    // jQuery.validator.addMethod('username_rule', function (value, element) {
    //     if (/^[a-zA-Z0-9_-]+$/.test(value)) {
    //         return true;
    //     } else {
    //         return false;
    //     };
    // });

    // $.validator.addMethod('email_rule', function (value, element) {
    //     if (/^([a-zA-Z0-9_\-\.]+)\+?([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
    //         return true;
    //     } else {
    //         return false;
    //     };
    // });

    $('.card_validation').validate({
        rules: {
            // 'card_url': {
            //     required: true,
            //     maxlength: 124,
            //     minlength: 2,
            // },

            'card_for': {
                required: true,
                maxlength: 124,
                minlength: 2,
            },

            'name': {
                required: true,
                maxlength: 124,
                minlength: 2,
            },
            'location': {
                required: false,
                maxlength: 124,
                minlength: 2,
            },
            'designation': {
                required: true,
                maxlength: 124,
                minlength: 2,
            },
            'company_name': {
                required: true,
                maxlength: 124,
                minlength: 2,
            },
            'bio': {
                required: false,
                maxlength: 255,
            },
        },
        messages: {},
        submitHandler: function(form) {
            $('.save-card-spinner').addClass('active');
            $(this).find('.save-card').prop('disabled', true);
            $(".btn-txt").text("Processing ...");
            setTimeout(function(){
                $(".save-card-spinner").removeClass("active");
                $('.save-card').attr("disabled", false);
                $(".btn-txt").text("Save");
            }, 50000);
            form.submit();

          },
          errorPlacement: function(error, element) {
            $(element).parents('.form-group').append(error)
        },
    });

});







