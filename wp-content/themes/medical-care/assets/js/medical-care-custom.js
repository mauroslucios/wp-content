

jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    medical_care_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
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
  jQuery('#medical-care-scroll-to-top').click(function (argument) {
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