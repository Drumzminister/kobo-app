import API from '../classes/API';

export default function(Vue) {
    Vue.api = new API({});

    Object.defineProperties(Vue.prototype, {
        $api: {
            get() {
                return Vue.api;
            }
        }
    });
}
