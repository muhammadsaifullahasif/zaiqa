document.addEventListener("DOMContentLoaded", function () {
  function setSlideHeight(swiper) {
    const currentSlide = swiper.activeIndex;
    const newHeight = swiper.slides[currentSlide].offsetHeight;
    document.querySelectorAll('.product-single__thumbnail .swiper-wrapper, .product-single__thumbnail .swiper-slide')
      .forEach(el => el.style.height = newHeight + 'px');
    swiper.update();
  }

  document.querySelectorAll(".product-single__media").forEach(mediaContainer => {
    if (mediaContainer.classList.contains("product-media-initialized")) return;

    const mediaType = mediaContainer.dataset.mediaType;
    mediaContainer.classList.add(mediaType);

    // === VERTICAL THUMBNAIL ===
    if (mediaType === "vertical-thumbnail") {
      const galleryThumbs = new Swiper(".product-single__thumbnail .swiper-container", {
        direction: "vertical",
        slidesPerView: 6,
        spaceBetween: 0,
        freeMode: true,
        breakpoints: {
          0: { direction: "horizontal", slidesPerView: 4 },
          992: { direction: "vertical" }
        },
        on: {
          init() { setSlideHeight(this); },
          slideChangeTransitionEnd() { setSlideHeight(this); }
        }
      });

      const galleryMain = new Swiper(".product-single__image .swiper-container", {
        direction: "horizontal",
        slidesPerView: 1,
        spaceBetween: 32,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        grabCursor: true,
        thumbs: { swiper: galleryThumbs },
        on: {
          slideChangeTransitionStart() {
            galleryThumbs.slideTo(galleryMain.activeIndex);
          }
        }
      });
    }

    // === VERTICAL DOT TYPE ===
    else if (mediaType === "vertical-dot") {
      new Swiper(".product-single__image .swiper-container", {
        slidesPerView: 1,
        spaceBetween: 32,
        pagination: {
          el: ".product-single__image .swiper-pagination",
          type: "bullets",
          clickable: true
        },
        grabCursor: true
      });
    }

    // === HORIZONTAL THUMBNAIL ===
    else if (mediaType === "horizontal-thumbnail") {
      const galleryThumbs = new Swiper(".product-single__thumbnail .swiper-container", {
        direction: "horizontal",
        slidesPerView: 6,
        freeMode: true,
        breakpoints: {
          0: { slidesPerView: 4 },
          992: { slidesPerView: 7 }
        }
      });

      const galleryMain = new Swiper(".product-single__image .swiper-container", {
        direction: "horizontal",
        slidesPerView: 1,
        spaceBetween: 32,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        grabCursor: true,
        thumbs: { swiper: galleryThumbs },
        on: {
          slideChangeTransitionStart() {
            galleryThumbs.slideTo(galleryMain.activeIndex);
          }
        }
      });
    }

    mediaContainer.classList.add("product-media-initialized");
  });
});
