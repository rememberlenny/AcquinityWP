$(document).ready(function()    {
  $('#brandslider').foundation('orbit', {  stack_on_small: false, animation_speed: 750, bullets: false, bullets: true, }, function (response) {
  });
  $('#featsucc').foundation('orbit', {  timer_speed: 0, stack_on_small: false, animation_speed: 750, bullets: false, bullets: true, }, function (response) {
    $('#featsucc').find('.orbit-timer span').click();
  });
});