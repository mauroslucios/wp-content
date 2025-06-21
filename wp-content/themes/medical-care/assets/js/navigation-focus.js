function medical_care_trapFocus( element, namespace ) {
  var medical_care_focusableEls = element.find( 'a, button' );
  var medical_care_firstFocusableEl = medical_care_focusableEls[0];
  var medical_care_lastFocusableEl = medical_care_focusableEls[medical_care_focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  medical_care_firstFocusableEl.focus();

  element.keydown( function(e) {
    var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

    if ( !isTabPressed ) { 
      return;
    }

    if ( e.shiftKey ) /* shift + tab */ {
      if ( document.activeElement === medical_care_firstFocusableEl ) {
        medical_care_lastFocusableEl.focus();
        e.preventDefault();
      }
    } else /* tab */ {
      if ( document.activeElement === medical_care_lastFocusableEl ) {
        medical_care_firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}