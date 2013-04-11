
// Home Sliders
// 

$(document).ready(function()    {
  $('#masthead-photo').delay(200).animate({opacity:1.0}, 'linear', function(){ 
    $('#windows8').animate({opacity:0, 'margin-left':'-70px'}, 'linear');
    $('#masthead-photo-extension').animate({opacity:1.0, 'margin-left':'0em'}, 'linear', function(){
      $('#brand-logo-ul').delay(400).animate({opacity:1.0}, 'linear');
    });
  });
  $('#featsucc').foundation('orbit');
  $('#brandslider').foundation('orbit',{
      timer_speed: 8000
    , stack_on_small: false
    , animation_speed: 1000
    , bullets: false
  });
  $('#pausetarget').find('.orbit-timer span').click();
  
});