
// Home Sliders
// 

$(document).ready(function()    {
  $('#masthead-photo').delay(200).animate({opacity:1.0}, 'linear', function(){ 

    // The balls slide out
    $('#windows8').animate({opacity:0, 'margin-left':'-70px'}, 'linear');
    
    // Moves text over for slider animation
    $('#masthead-photo-extension').animate({opacity:1.0, 'margin-left':'0em'}, 'linear', function(){

      // Stagger the brand appearance for first set
      $('#brand-logo-li-1').delay().animate({opacity:1.0}, 'linear', function(){       
        $('#brand-logo-li-2').delay().animate({opacity:1.0}, 'linear', function(){ 
          $('#brand-logo-li-3').delay().animate({opacity:1.0}, 'linear', function(){ 
            $('#brand-logo-li-4').delay().animate({opacity:1.0}, 'linear', function(){ 
              $('#brand-logo-li-5').delay().animate({opacity:1.0}, 'linear', function(){ 
                $('#brand-logo-li-6').delay().animate({opacity:1.0}, 'linear', function(){
                  $('.brand-logo-ul').delay(4000).animate({opacity:1.0}, 'linear',
                  function(){
                    // Places a containing css selector to make sure the second round of slides all come in opacity:1
                    $('#brand-logo-case').addClass("active-now");
                  });
                });
              });
            });
          });
        });
      });
    });
  });

  // Initiate the slider for Success Stories
  $('#featsucc').foundation('orbit');

  // Start the Brand Logo slider
  $('#brandslider').foundation('orbit',{
      timer_speed: 13000
    , stack_on_small: false
    , animation_speed: 1000
    , bullets: false
  }, function(response){});

  // Stop the Success Stories slider
  $('#pausetarget').find('.orbit-timer span').click();
  
});