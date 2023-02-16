$(document).ready(function () {
  $(".peopple_in").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    center: true,
    margin: 15,
    items: 2,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        loop: true,
      },
      600: {
        items: 1,
        loop: true,
      },
      1000: {
        items: 3,
      },
    },
  });

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 200) {
      $(".fixed-bottom").addClass("shwbtm");
    } else {
      $(".fixed-bottom").removeClass("shwbtm");
    }
  });
});

$(document).ready(function () {
  $(".car_cards").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    center: true,
    margin: 10,
    items: 2,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1.3,
        loop: true,
      },
      600: {
        items: 1,
        loop: true,
      },
      1000: {
        items: 3,
      },
    },
  });
});
