
// Home Sliders
// 

$(document).ready(function()    {
  $('#masthead-photo').delay(200).animate({opacity:1.0}, 'linear', function(){ 
    $('#windows8').animate({opacity:0, 'margin-left':'-70px'}, 'linear');
    $('#masthead-photo-extension').animate({opacity:1.0, 'margin-left':'0em'}, 'linear', function(){
      $('#brand-logo-li-1').delay().animate({opacity:1.0}, 'linear', function(){       
        $('#brand-logo-li-2').delay().animate({opacity:1.0}, 'linear', function(){ 
          $('#brand-logo-li-3').delay().animate({opacity:1.0}, 'linear', function(){ 
            $('#brand-logo-li-4').delay().animate({opacity:1.0}, 'linear', function(){ 
              $('#brand-logo-li-5').delay().animate({opacity:1.0}, 'linear', function(){ 
                $('#brand-logo-li-6').delay().animate({opacity:1.0}, 'linear', function(){
                  $('.brand-logo-ul').delay(5400).animate({opacity:1.0}, 'linear',
                  function(){
                    $('#brand-logo-case').addClass("active-now");
                    // Places a containing css selector to make sure the second round of slides all come in opacity:1
                  });
                });
              });
            });
          });
        });
      });
    });
  });
  $('#featsucc').foundation('orbit');
  $('#brandslider').foundation('orbit',{
      timer_speed: 13000
    , stack_on_small: false
    , animation_speed: 1000
    , bullets: false
  }, function(response){});
  $('#pausetarget').find('.orbit-timer span').click();
  
});