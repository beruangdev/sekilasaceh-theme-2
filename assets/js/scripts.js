import "./init_splide"

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


    // Swipper
    const swiper_default_attr = {
        lazy: true,
        debugger: true,
    }

    if (document.querySelector(".swiper.featured-post")) {
        new Swiper('.swiper.featured-post', {
            ...swiper_default_attr,
            loop: true,
            dragMode: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
        });
    }

    if (document.querySelector(".swiper.free-mode")) {
        new Swiper(".swiper.free-mode", {
            ...swiper_default_attr,
            slidesPerView: 2.3,
            spaceBetween: 8,
            freeMode: true,
            dragMode: true,
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
        });
    }
});
