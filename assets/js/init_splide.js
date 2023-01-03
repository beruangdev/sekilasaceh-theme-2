document.addEventListener("DOMContentLoaded", function () {

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

    // Front page -> feature slide
    document.querySelectorAll(".splide_thumbnails_wrapper").forEach(splide_thumbnails_wrapper => {
        let el_splide = splide_thumbnails_wrapper.querySelector(".splide.main")
        let el_thumbnail = splide_thumbnails_wrapper.querySelector(".thumbnail-slider")
        let main = new Splide(el_splide, {
            ...splide_default_attr,
            // type: 'fade',
            type   : 'loop',
            heightRatio: 0.6,
            pagination: false,
            arrows: false,
            autoplay: true,
            resetProgress: false,
            interval: 2000,
            // cover: true,
        });
        main.on('moved', function (newIndex, prefIndex, destIndex) {
            var Autoplay = main.Components.Autoplay;
            if (newIndex == main.length - 1) {
                Autoplay.pause()
            }
        });

        main.on('drag', function (newIndex, prefIndex, destIndex) {
            var Autoplay = main.Components.Autoplay;
            Autoplay.pause()
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
