<?php

/*-------------------------------------------------------------------------------------

TABLE OF CONTENTS

- Homepage Left Column with content bar

-------------------------------------------------------------------------------------*/

function leftcontentBarContent(){

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

<div class="large-10 large-offset-1 column">
  <h4 class="subheader text-center" style="color:#333;">What we do</h4>
  <h3>
  We'll help you surpass your goals.</h3> 
  <p>
  Acquinity’s popular self-produced destination sites capture consumer attention. Our media buyers use search, social and display to bring visitors to this suite of web properties. Visitors register and become Members, and extensive data (demographics, shopping preferences, health conditions) is gathered through surveys and saved. Members are also accrued from our vast in-house database of email records.
  </p>
  <a href="#" class="button fr radius">Learn more about Acquinity</a>
  <div class="spacing row"></div>
</div>


<?php

}

function leftcontentBarHome(){
?>
<div class="content brandwrap row twelve">
  <div class="main large-12 columns" >
    <div class="brand-bar clearboth" >
      <div  id="brand-logo-case" class="brand-bar-extension" >
        <div id="brandslider" class="brand-bar-content brand-color-back">
          <?php leftcontentBarContent(); ?>
        </div>
      </div>
    </div>    
  </div>
</div>  
<?php
}

?>