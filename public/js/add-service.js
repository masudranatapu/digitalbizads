(function ($) {
    "use strict";
    function addService() {
        var id = getRandomInt(); 
        var services = "<div class='row' id="+ id +"><div class='col-md-6 col-xl-6'> <div class='mb-3'> <div class='form-label'>Service Image<span class='text-danger'>(1MB max size)</span></div><input type='file' class='form-control' name='service_image[]' placeholder='Service Image'/> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Service Name</label> <input type='text' class='form-control' name='service_name[]' placeholder='Service Name'> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Service Description</label> <input type='text' class='form-control' name='service_description[]' placeholder='Service Description...''> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label' for='enquiry'>Enquiry Button</label> <select name='enquiry[]' id='enquiry' class='form-control'> <option value='Enabled'>Enabled</option> <option value='Disabled'>Disabled</option> </select> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeService("+id+")'>Remove</a>  </div> <br></div> </div>";
        $("#more-services").append(services).html();
    }

    function removeService(id) {                                                
        $("#"+id).remove();
    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }
})(jQuery);