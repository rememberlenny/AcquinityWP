<?php

function brandBarLogoContent(){

?>

<ul data-orbit >
  <li class="brand-row" data-orbit-slide>
    <div>
      <ul class="large-block-grid-6 small-block-grid-4  brand-logo-ul" style="opacity:0;" >
        <li><img src="images/logos/disney-logo.png" alt=""></li>
        <li><img src="images/logos/kelloggs-logo.png" alt=""></li>
        <li><img src="images/logos/ebay-logo.png" alt=""></li>
        <li><img src="images/logos/aarp-logo.png" alt=""></li>
        <li class="hide-for-small"><img src="images/logos/eharmony-logo.png" alt=""></li>
        <li class="hide-for-small"><img src="images/logos/travelocity-logo.png" alt=""></li>
      </ul>
    </div> 
  </li>
  <li class="brand-row" data-orbit-slide>
    <div>
      <ul class="large-block-grid-6 small-block-grid-4  brand-logo-ul"  style="opacity:0;">
        <li><img src="images/logos/groupon-logo.png" alt=""></li>
        <li><img src="images/logos/overstock-logo.png" alt=""></li>
        <li><img src="images/logos/jsp-logo.png" alt=""></li>
        <li><img src="images/logos/shoedazzle.png" alt=""></li>
        <li class="hide-for-small"><img src="images/logos/achievecard-logo.png" alt=""></li>
        <li class="hide-for-small"><img src="images/logos/educationdynamics-logo.png" alt=""></li>
      </ul>
    </div> 
  </li>
  <li class="brand-row" data-orbit-slide style="">
    <div>
      <ul class="large-block-grid-6 small-block-grid-4">
        <li style="opacity:0;" id="brand-logo-li-1" ><img src="images/logos/netflix-logo.png" alt=""></li>
        <li style="opacity:0;" id="brand-logo-li-2" ><img src="images/logos/sc-johnson-logo.png" alt=""></li>
        <li style="opacity:0;" id="brand-logo-li-3" ><img src="images/logos/vonage-logo.png" alt=""></li>
        <li style="opacity:0;" id="brand-logo-li-4" ><img src="images/logos/tigerdirect-logo.png" alt=""></li>
        <li style="opacity:0;" id="brand-logo-li-5"  class="hide-for-small"><img src="images/logos/terracom-logo.png" alt=""></li>
        <li style="opacity:0;" id="brand-logo-li-6" class="hide-for-small"><img src="images/logos/travellers-logo.png" alt=""></li>
      </ul>
    </div> 
  </li>

</ul>
<?php

}

function brandBarHome(){
?>
<div class="content brandwrap row twelve">
  <div class="main large-12 columns" >
    <div class="brand-bar clearboth" >
      <div  id="brand-logo-case" class="brand-bar-extension" >
        <div id="brandslider" class="brand-bar-content brand-color-back">
          <?php brandBarLogoContent(); ?>
        </div>
      </div>
    </div>    
  </div>
</div>  
<?php
}
?>