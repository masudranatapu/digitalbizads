function getPlan(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("plan_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/delete-plan?id=" + parameter);
}

function getUser(parameter) {
    "use strict";
    $("#status-modal").modal("show");
    var link = document.getElementById("user_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/update-status?id=" + parameter);
}

function deleteUser(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("deleted_user_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/delete-user?id=" + parameter);
}

function getPaymentMethod(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("payment_gateway_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/delete-payment-method?id=" + parameter);
}

function getTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/transaction-status/" + parameter + "/SUCCESS");
}

function getOfflineTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/offline-transaction-status/" + parameter + "/SUCCESS");
}

function loginUser(parameter) {
    "use strict";
    $("#login-modal").modal("show");
}

$(document).on("click", ".open-qr", function() {
    "use strict";
    $('#openQR').modal('show');
    var cardurl = $(this).data('id');
    var url = window.location.origin + "/" + cardurl;
    var link = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" + url + "&choe=UTF-8";
    var preview = document.getElementById("cardURL"); //getElementById instead of querySelectorAll
    preview.setAttribute("src", link);
    // As pointed out in comments,
    // it is unnecessary to have to manually call the modal.
});