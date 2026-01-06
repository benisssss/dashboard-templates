TOAST = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    customClass: {
        container: 'w-auto',
        popup: 'toast-swal-popup',
        title: 'd-flex flex-row align-items-center justify-content-center'
    }
});
