
function beauty_salon_spa_gb_Menu_open() {
	jQuery(".side_gb_nav").addClass('show');
}
function beauty_salon_spa_gb_Menu_close() {
	jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
	$('.gb_toggle').click(function () {
        beauty_salon_spa_Keyboard_loop($('.side_gb_nav'));
    });
});

jQuery('document').ready(function(){
  var owl = jQuery('#home-services .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : false,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: true,
    dots:false,
    navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 2
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

jQuery(window).scroll(function(){
  if (jQuery(this).scrollTop() > 50) {
    jQuery('.scrollup').addClass('is-active');
  } else {
      jQuery('.scrollup').removeClass('is-active');
  }
});

jQuery( document ).ready(function() {
  jQuery('#beauty-salon-spa-scroll-to-top').click(function (argument) {
    jQuery("html, body").animate({
           scrollTop: 0
       }, 600);
  })
})
// sticky header
jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 120) {
        jQuery('.fixed_header').addClass('fixed');
    } else {
            jQuery('.fixed_header').removeClass('fixed');
    }
});

/* Custom Cursor
 **-----------------------------------------------------*/
// Add this in custom-cursor.js
jQuery(document).ready(function($) {
  var cursor = $(".custom-cursor");
  var follower = $(".custom-cursor-follower");
  var offsetX = 15; // Set your desired horizontal offset
  var offsetY = 15; // Set your desired vertical offset

  $(document).mousemove(function(e) {
    cursor.css({
      top: e.clientY - offsetY + "px",
      left: e.clientX - offsetX + "px"
    });
    follower.css({
      top: e.clientY + "px",
      left: e.clientX + "px"
    });
  });

  $("a, button").hover(
    function() {
      cursor.addClass("active");
      follower.addClass("active");
    },
    function() {
      cursor.removeClass("active");
      follower.removeClass("active");
    }
  );
});

/*preloader*/
jQuery(document).ready(function($) {

  // Function to hide preloader
  function hidePreloader() {
    $("#preloader ").delay(2000).fadeOut("slow");
  }

  // Check if all resources have been loaded
  if (document.readyState === "complete") {
    hidePreloader();
  } else {
    window.onload = hidePreloader;
  }
});

// TEXT COLOR

jQuery(function($){
    jQuery(".slider-title").each(function() {
    var t = jQuery(this).text();
    var splitT = t.split(" ");
    var halfIndex = Math.round(splitT.length / 2);
    var newText = "";
    for(var i = 0; i < splitT.length; i++) {
    if(i == halfIndex) {
      newText += "<span style='color:#232323'>";
    }
      newText += splitT[i] + " ";
    }
    newText += "</span>";
    jQuery(this).html(newText);
  });
});

// SEARCH POPUP

jQuery(document).ready(function($) {
    $('.header-search-wrapper .search-main').click(function() {
        $('.search-form-main').toggleClass('active-search');
        $('.search-form-main .search-field').focus();
        $('.header-search-wrapper').toggleClass('icon-toggle');
    });

    $('.search-close-icon').click(function() {
        $('.search-form-main').removeClass('active-search');
        $('.header-search-wrapper').removeClass('icon-toggle');
    });
});