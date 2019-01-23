const swal = require('sweetalert2');

export const toast = (title, type, position = "top-end") => {
    const toast = swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: 3000
    });

    toast({
        type: type,
        title: title
    })
};

export const confirmSomethingWithAlert = (message, title = 'Are you sure?') => {
    return swal.fire({
        title: title,
        text: message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    });
};