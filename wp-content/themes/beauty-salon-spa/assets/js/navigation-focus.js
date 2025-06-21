var beauty_salon_spa_Keyboard_loop = function (elem) {
  var beauty_salon_spa_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var beauty_salon_spa_firstTabbable = beauty_salon_spa_tabbable.first();
  var beauty_salon_spa_lastTabbable = beauty_salon_spa_tabbable.last();
  beauty_salon_spa_firstTabbable.focus();

  beauty_salon_spa_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      beauty_salon_spa_firstTabbable.focus();
    }
  });

  beauty_salon_spa_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      beauty_salon_spa_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};