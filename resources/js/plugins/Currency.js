export default function(Vue) {
    Vue.currency = new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2
    });
    
    Vue.beautify = function (event) {
        console.log(event.target);
    };

    Object.defineProperties(Vue.prototype, {
        $currency: {
            get() {
                return Vue.currency;
            }
        }
    });
}
