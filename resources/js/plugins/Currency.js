export default function(Vue) {
    Vue.currency = new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2
    });

    Object.defineProperties(Vue.prototype, {
        $currency: {
            get() {
                return Vue.currency;
            }
        }
    });
}
