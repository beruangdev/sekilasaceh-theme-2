document.addEventListener("DOMContentLoaded", function () {
    // Handler when the DOM is fully loaded
    document.querySelectorAll(".button-menu").forEach(el => {
        el.addEventListener("click", (e) => {
            e.preventDefault()
            document.querySelector(".wrapper-menu").classList.toggle("hidden")
        })
    })


    // Menu Dropdown
    document.body.addEventListener("click", (e) => {
        if (!e.target.classList.contains("button-dropdown") && !e.target.closest(".button-dropdown")) {
            document.querySelectorAll(".button-dropdown").forEach(el => {
                if (!el.nextElementSibling.classList.contains("hidden")) {
                    el.nextElementSibling.classList.add("hidden")
                }
            })
        }
    })

    document.querySelectorAll(".button-dropdown").forEach(el => {
        el.addEventListener("click", () => {
            el.nextElementSibling.classList.toggle("hidden")
        })
    });

    // Menu Dropdown END

    document.querySelectorAll(".search-toggle").forEach(el => {
        el.addEventListener("click", (e) => {
            e.preventDefault()
            let el_wrapper_search = document.querySelector(".wrapper-search")
            let el_wrapper_search_class = el_wrapper_search.classList


            el_wrapper_search_class.remove("hidden")
            el_wrapper_search_class.add("flex")
            // el_wrapper_search_class.toggle("active")
            if (el_wrapper_search_class.contains("animate__slideInDown")) {
                el_wrapper_search_class.remove("animate__slideInDown")
                el_wrapper_search_class.add("animate__slideOutUp")
            } else {
                el_wrapper_search_class.remove("animate__slideOutUp")
                el_wrapper_search_class.add("animate__slideInDown")
            }
        })
    });
});
