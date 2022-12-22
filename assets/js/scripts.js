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


    // Splide Slider
    const splide_default_attr = {
        lazyLoad: 'nearby',
        drag: true,
        paginationKeyboard: true,
        keyboard: "focus",
        wheel: true,
        releaseWheel: true,
        isNavigation: true,
        slideFocus: true,
        // cover: true,
        arrows: false,
        pagination: false,
    }

    document.querySelectorAll(".splide.free-mode").forEach(splide_el => {
        let splide_init = new Splide(splide_el, {
            ...splide_default_attr,
            drag: 'free',
            perPage: 2.1,
            padding: { left: '1rem', right: '1rem' },
            gap: "0.5rem",
        })

        let splide_bar = splide_init.root.querySelector('.my-slider-progress-bar');

        if (splide_bar) {
            splide_init.on(`mounted move drag dragging dragged scroll scrolled`, function () {
                var end = splide_init.Components.Controller.getEnd() + 1;
                var rate = Math.min((splide_init.index + 1) / end, 1);
                rate = String(100 * rate)
                if (rate <= 10) rate = 0
                splide_bar.style.width = rate + '%';
            });
        }

        splide_init.mount()
    });
    document.querySelectorAll(".splide_thumbnails_wrapper").forEach(splide_thumbnails_wrapper => {
        let el_splide = splide_thumbnails_wrapper.querySelector(".splide.main")
        let el_thumbnail = splide_thumbnails_wrapper.querySelector(".thumbnail-slider")
        let main = new Splide(el_splide, {
            ...splide_default_attr,
            // type: 'fade',
            heightRatio: 0.6,
            pagination: false,
            arrows: false,
            autoplay: true,
            interval: 1000,
            // cover: true,
        });

        let thumbnails = new Splide(el_thumbnail, {
            // ...splide_default_attr,
            rewind: true,
            isNavigation: true,
            focus: 'center',
            pagination: false,
            lazyLoad: 'nearby',
            // cover: true,
            dragMinThreshold: {
                mouse: 4,
                touch: 10,
            },
            gap: 2,
            perPage: 4.2,
            // heightRatio: 0.5,
            // fixedWidth: 104 * 1.6,
            // fixedHeight: 58 * 1.6,
            // breakpoints: {
            //     640: {
            //         fixedWidth: 66 * 1.3,
            //         fixedHeight: 38 * 1.3,
            //     },
            // },
        });

        main.sync(thumbnails);
        main.mount();
        thumbnails.mount();
    });

});
