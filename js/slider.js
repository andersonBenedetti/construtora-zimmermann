jQuery(document).ready(function ($) {
  // Carrosséis Slick
  $(".carousel-cards").slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 3,
    slidesToScroll: 1,
    swipeToSlide: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".carousel-home").slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".carousel-services").slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
});

jQuery(document).ready(function ($) {
  var isThumbsDragging = false;
  var startX = 0;
  var startY = 0;
  var scrollLeft = 0;
  var scrollTop = 0;

  $(".flexslider").flexslider({
    animation: "slide",
    controlNav: "thumbnails",
    directionNav: true,
    prevText: "",
    nextText: "",
    slideshow: false,
    animationLoop: false,
    smoothHeight: true,
    start: function (slider) {
      slider.addClass("flexslider-loaded");
      $(".flex-direction-nav a").css({
        opacity: "1",
        visibility: "visible",
      });

      $(".flex-control-thumbs").css({
        display: "flex",
        overflowX: "auto",
        cursor: "grab",
      });

      setTimeout(function () {
        slider.flexAnimate(0);
      }, 100);
    },
  });

  $(".flex-control-thumbs").on("mousedown", function (e) {
    $(this).addClass("dragging");
    startX = e.pageX - $(this).offset().left;
    startY = e.pageY - $(this).offset().top;
    scrollLeft = $(this).scrollLeft();
    scrollTop = $(this).scrollTop();

    $(this).on("mousemove", function (e) {
      if ($(this).hasClass("dragging")) {
        e.preventDefault();
        var x = e.pageX - $(this).offset().left;
        var y = e.pageY - $(this).offset().top;
        var walkX = (x - startX) * 3;
        var walkY = (y - startY) * 3;
        $(this).scrollLeft(scrollLeft - walkX);
        $(this).scrollTop(scrollTop - walkY);
      }
    });

    $(this).on("mouseup mouseleave", function () {
      $(this).removeClass("dragging");
      $(this).off("mousemove");
    });
  });

  $(".flex-viewport").on("touchstart", function (e) {
    if (isThumbsDragging) {
      e.preventDefault();
    }
  });

  $(".flex-control-thumbs")
    .on("touchstart", function (e) {
      isThumbsDragging = true;
      startX = e.touches[0].pageX - $(this).offset().left;
      startY = e.touches[0].pageY - $(this).offset().top;
      scrollLeft = $(this).scrollLeft();
      scrollTop = $(this).scrollTop();
    })
    .on("touchmove", function (e) {
      if (isThumbsDragging) {
        e.preventDefault();
        var x = e.touches[0].pageX - $(this).offset().left;
        var y = e.touches[0].pageY - $(this).offset().top;
        var walkX = (x - startX) * 3;
        var walkY = (y - startY) * 3;
        $(this).scrollLeft(scrollLeft - walkX);
        $(this).scrollTop(scrollTop - walkY);
      }
    })
    .on("touchend", function () {
      isThumbsDragging = false;
    });
});
