(function ($) {
    "use strict";
    function addGallery() {
        var id = getRandomInt();

        var gallery = "<div class='row' id=" + id + "><div class='col-md-6 col-xl-6'> <div class='mb-3'> <div class='form-label'>Gallery Image<span class='text-muted'>1MB max size</span> </div><input type='file' class='form-control' name='gallery_image[]' placeholder='Gallery Image' required/> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Image Caption</label> <input type='text' class='form-control' name='caption[]' placeholder='Image Caption...' required> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeGallery(" + id + ")'>Remove</a>  </div><br></div>";
        $("#more-gallery").append(gallery).html();
    }

    function removeGallery(id) {
        $("#" + id).remove();
    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }
})(jQuery);