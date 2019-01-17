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