
// Home Sliders
// 

$(document).ready(function()    {
  $('#brandslider').foundation('orbit', {  timer_speed: 5000,stack_on_small: false, animation_speed: 750, bullets: false, }, function (response) {
  });
  $('#featsucc').foundation('orbit', { timer_speed: 9999999,stack_on_small: false, animation_speed: 750, }, function (response) {
  });
});

// Loading Balls

$(document).ready(function() {
  $('#masthead-photo').delay(200).animate({opacity:1.0}, 'linear', function(){ 
    $('#windows8').animate({opacity:0, 'margin-left':'-70px'}, 'linear');
    $('#masthead-photo-extension').animate({opacity:1.0, 'margin-left':'0em'}, 'linear', function(){});
  });
});