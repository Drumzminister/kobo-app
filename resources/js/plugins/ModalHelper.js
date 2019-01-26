export default function(Vue) {
    Vue.modal = {
        open: function (id) {
            $(id).modal({
                backdrop: 'static',
                keyboard: false
            });
        },
        close: function (id) {
            $(id).modal('hide');
        }
    };

    Object.defineProperties(Vue.prototype, {
        $modal: {
            get() {
                return Vue.modal;
            }
        }
    });
}
