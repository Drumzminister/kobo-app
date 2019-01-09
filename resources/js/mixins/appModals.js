export const appModal = {
    data: {

    },
    methods: {
        openModal: function (id) {
            $(id).modal({
                backdrop: 'static',
                keyboard: false
            });
        },
        closeModal: function (id) {
            $(id).modal('hide');
        }
    }
};