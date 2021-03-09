(function () {
    /* infinite scroll */
    const gallery = document.getElementById("gallery");
    const items = document.querySelectorAll(".grid--item");

    const showItems = () => {
        items.forEach((item) => {
            item.classList.remove("hide");
        });
    };

    gallery.addEventListener("scroll", () => {
        if (gallery.scrollTop + gallery.clientHeight >= gallery.scrollHeight) {
            showItems();
        }
    });

    // showItems();

    /* form validation */
    const forms = document.querySelectorAll(".needs-validation");

    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (e) => {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();
