(function () {
    var lazyLoadInstances = [];

    function logElementEvent(eventName, element) {
        console.log(Date.now(), eventName, element);
    }

    var initOneLazyLoad = function (lazyContainerElement) {
        var oneLL = new LazyLoad({
            container: lazyContainerElement,
        });

        lazyLoadInstances.push(oneLL);
        logElementEvent("🔑 ENTERED", lazyContainerElement);
    };

    var callback_exit = function (element) {
        logElementEvent("🚪 EXITED", element);
    };
    var callback_loading = function (element) {
        logElementEvent("⌚ LOADING", element);
    };
    var callback_loaded = function (element) {
        logElementEvent("👍 LOADED", element);
    };
    var callback_error = function (element) {
        logElementEvent("💀 ERROR", element);
        element.src =
            "https://via.placeholder.com/440x560/?text=Error+Placeholder";
    };
    var callback_finish = function () {
        logElementEvent("✔️ FINISHED", document.documentElement);
    };
    var callback_cancel = function (element) {
        logElementEvent("🔥 CANCEL", element);
    };

    var lazyLazy = new LazyLoad({
        elements_selector: ".lazyContainer",
        unobserve_entered: true,
        callback_enter: initOneLazyLoad,
        callback_exit: callback_exit,
        callback_cancel: callback_cancel,
        callback_loading: callback_loading,
        callback_loaded: callback_loaded,
        callback_error: callback_error,
        callback_finish: callback_finish,
    });
})();
