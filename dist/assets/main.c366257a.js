document.addEventListener("DOMContentLoaded",function(){document.querySelectorAll(".button-menu").forEach(e=>{e.addEventListener("click",t=>{t.preventDefault(),document.querySelector(".wrapper-menu").classList.toggle("hidden")})}),document.body.addEventListener("click",e=>{!e.target.classList.contains("button-dropdown")&&!e.target.closest(".button-dropdown")&&document.querySelectorAll(".button-dropdown").forEach(t=>{t.nextElementSibling.classList.contains("hidden")||t.nextElementSibling.classList.add("hidden")})}),document.querySelectorAll(".button-dropdown").forEach(e=>{e.addEventListener("click",()=>{e.nextElementSibling.classList.toggle("hidden")})}),document.querySelectorAll(".search-toggle").forEach(e=>{e.addEventListener("click",t=>{t.preventDefault();let r=document.querySelector(".wrapper-search").classList;r.remove("hidden"),r.add("flex"),r.contains("animate__slideInDown")?(r.remove("animate__slideInDown"),r.add("animate__slideOutUp")):(r.remove("animate__slideOutUp"),r.add("animate__slideInDown"))})});const o={lazy:!0,debugger:!0};document.querySelector(".swiper.featured-post")&&new Swiper(".swiper.featured-post",{...o,loop:!0,dragMode:!0,autoplay:{delay:2500,disableOnInteraction:!1},pagination:{el:".swiper-pagination",type:"progressbar"}}),document.querySelector(".swiper.free-mode")&&new Swiper(".swiper.free-mode",{...o,slidesPerView:2.3,spaceBetween:8,freeMode:!0,dragMode:!0,pagination:{el:".swiper-pagination",type:"progressbar"}});const i={lazyLoad:"nearby",drag:!0,paginationKeyboard:!0,keyboard:"focus",wheel:!0,releaseWheel:!0,isNavigation:!0,slideFocus:!0,cover:!0,arrows:!1,pagination:!1};document.querySelectorAll(".splide.free-mode").forEach(e=>{let t=new Splide(e,{...i,drag:"free",perPage:2.1,padding:{left:"1rem",right:"1rem"},gap:"0.5rem"}),a=t.root.querySelector(".my-slider-progress-bar");a&&t.on("mounted move drag dragging dragged scroll scrolled",function(){var r=t.Components.Controller.getEnd()+1,n=Math.min((t.index+1)/r,1);n=String(100*n),n<=10&&(n=0),a.style.width=n+"%"}),t.mount()}),document.querySelectorAll(".splide_thumbnails_wrapper").forEach(e=>{let t=e.querySelector(".splide.main"),a=e.querySelector(".thumbnail-slider"),r=new Splide(t,{...i,heightRatio:.6,pagination:!1,arrows:!1,cover:!0}),n=new Splide(a,{rewind:!0,isNavigation:!0,focus:"center",pagination:!1,lazyLoad:"nearby",dragMinThreshold:{mouse:4,touch:10},gap:2,perPage:4.2});r.sync(n),r.mount(),n.mount()})});
