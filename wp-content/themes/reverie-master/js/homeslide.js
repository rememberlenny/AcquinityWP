$(document).ready(function()    {
  $('#brandslider').foundation('orbit', {  timer_speed: 10000,stack_on_small: false, animation_speed: 750, bullets: false, bullets: true, }, function (response) {
  });
  $('#featsucc').foundation('orbit', { stack_on_small: false, animation_speed: 750, bullets: false, bullets: true, }, function (response) {
    $('#featsucc').find('.orbit-timer span').click();
  });
});