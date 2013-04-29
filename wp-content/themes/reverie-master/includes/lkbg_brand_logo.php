<?php

function brandBarLogoContent(){

?>
<style>
  .brand-logo-ul img{
    width: 110px;
  }
  .row .row.spacing{
    margin-top:6%;
  }
</style>
<div class="spacing row"></div>

<div class="large-5 column">
  <h4 class="subheader text-center" style="color:#333;">Proud partners</h4>
  <h3>
  We'll help you surpass your goals.</h3> 
  <p>
  Premier publishers, networks and brands from diverse verticals partner with Acquinity Interactive to surpass their sales, acquisition, market share and awareness objectives.
  </p>
  <a href="#" class="button radius">Read Acquinity success stories</a>
  <div class="spacing row"></div>
</div>
<div class="large-7 column">
  <div class="spacing row"></div>
  <ul >
    <li class="" class="text-center" style="text-align:center!important;">
      <div class="d-inline" style="clear:both;">
        <ul class="large-block-grid-4 small-block-grid-4  brand-logo-ul d-inline" style="display:inline-block !important;" >
          <li><img src="images/logos/disney-logo.png" alt=""></li>
          <li><img src="images/logos/kelloggs-logo.png" alt=""></li>
          <li><img src="images/logos/ebay-logo.png" alt=""></li>
          <li><img src="images/logos/aarp-logo.png" alt=""></li>
        </ul>
      </div>
      <div class="d-inline" style="clear:both;">
        <ul class="large-block-grid-4 small-block-grid-4  brand-logo-ul d-inline" style="display:inline-block !important;" >
          <li><img src="images/logos/netflix-logo.png" alt=""></li>
          <li><img src="images/logos/tigerdirect-logo.png" alt=""></li>
          <li><img src="images/logos/terracom-logo.png" alt=""></li>
          <li><img src="images/logos/sc-johnson-logo.png" alt=""></li>
        </ul>
      </div>
      <div class="d-inline" style="clear:both;">
        <ul class="large-block-grid-4 small-block-grid-4  brand-logo-ul d-inline"  style="display:inline-block !important;">
          <li><img src="images/logos/groupon-logo.png" alt=""></li>
          <li><img src="images/logos/overstock-logo.png" alt=""></li>
          <li><img src="images/logos/jsp-logo.png" alt=""></li>
          <li style="">
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
</div>

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