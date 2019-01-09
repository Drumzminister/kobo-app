export const loadingView = {
    data: {
        appLoading: false,
        appLoadingText: "Please Wait..."
    },
    methods: {
        showAppLoading: function () {
            this.appLoading = true;
        },
        setAppLoadingText: function (loadingText) {
            this.appLoadingText = loadingText;
        },
        hideAppLoading: function () {
            this.appLoading = false;
        },
    }
};