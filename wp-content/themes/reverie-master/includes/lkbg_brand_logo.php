<?php

function brandBarLogoContent(){

?>
<style>
  .brand-logo-ul img{
    width: 110px;
  }
  .row .row.spacing{
    margin-top:2%;
  }
</style>
<div class="spacing row"></div>
<h4 class="subheader text-center" style="color:#333;">Proud partners</h4>
<ul >
  <li class="" class="text-center" style="text-align:center!important;">
    <div class="d-inline" style="clear:both;">
      <ul class="large-block-grid-5 small-block-grid-4  brand-logo-ul d-inline" style="display:inline-block !important;" >
        <li><img src="images/logos/disney-logo.png" alt=""></li>
        <li><img src="images/logos/kelloggs-logo.png" alt=""></li>
        <li><img src="images/logos/ebay-logo.png" alt=""></li>
        <li><img src="images/logos/aarp-logo.png" alt=""></li>
        <li class="hide-for-small"><img src="images/logos/eharmony-logo.png" alt=""></li>
      </ul>
    </div>
    <div class="d-inline" style="clear:both;">
      <ul class="large-block-grid-4 small-block-grid-4  brand-logo-ul d-inline"  style="display:inline-block !important;">
        <li><img src="images/logos/groupon-logo.png" alt=""></li>
        <li><img src="images/logos/overstock-logo.png" alt=""></li>
        <li><img src="images/logos/jsp-logo.png" alt=""></li>
        <li><img src="images/logos/shoedazzle.png" alt=""></li>
      </ul>
    </div>
    <div class="" style="clear:both;">
      <ul class="large-block-grid-1 small-block-grid-4  brand-logo-ul d-inline"  style="display:inline-block !important;">
        <li style="border-radius: 10px;
border: 2px solid grey;">
          <h5 class="subheader" style="line-height: 1; margin-bottom:.1em; margin-top:.3em;">
            And hundreds more.
          </h5>
        </li>
      </ul>
    </div>
     <!--  <div class="d-inline" style="clear:both;">
        <ul class="large-block-grid-3 small-block-grid-4  brand-logo-ul d-inline" style="display:inline-block !important;" >
          <li style="" id="brand-logo-li-1" ><img src="images/logos/netflix-logo.png" alt=""></li>
          <li style="" id="brand-logo-li-2" ><img src="images/logos/sc-johnson-logo.png" alt=""></li>
          <li style="" id="brand-logo-li-3" ><img src="images/logos/vonage-logo.png" alt=""></li>
        </ul>
      </div>  -->
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