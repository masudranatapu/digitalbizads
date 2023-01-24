document.getElementById("year").innerHTML = new Date().getFullYear();

function successAlert(msg) {
    "use strict";
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: msg,
        showConfirmButton: false,
        timer: 1500
    })
}