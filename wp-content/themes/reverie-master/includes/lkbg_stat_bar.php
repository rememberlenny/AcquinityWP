<?php

function statBarContent(){

?>
<style>
  .brand-logo-ul img{
    width: 110px;
  }
  .row .row.spacing-t{
    margin-top:5%;
  }
  .stat-number{
    color: #333!important; 
    font-size: 2.4em !important;
  }
</style>
<div class="spacing-t row"></div>


<div class="large-5 push-1 column " style="margin-top:4em;">
  <h5 class="text-center subheader">Statistics Collected March 2013 from Quantcast</h5>
  <div class="row">
  </div>
  <div class="row">
    <div class="large-4 column">
      <div class="textwidget stat-case">
        <div class="d-inline text-center">
          <h4 style="text-transform:uppercase; font-size:1em;">
            <u>
             Email
            </u>
          </h4>
          <h5 class="subheader white stat-number mb02">
            80MM
          </h5>
          <p>
            in-house database
          </p>
        </div>
      </div>
    </div>
    <div class="large-4 column">
      <div class="textwidget stat-case">
        <div class="d-inline text-center">
          <h4 style="text-transform:uppercase; font-size:1em;">
            <u>
             Websites
            </u>
          </h4>
          <h5 class="subheader white stat-number mb02">
            3.8MM
          </h5>
          <p>
            monthly uniques 
          </p>
        </div>
      </div>
    </div>
    <div class="large-4 column">
      <div class="textwidget stat-case">
        <div class="d-inline text-center">
          <h4 style="text-transform:uppercase; font-size:1em;">
            <u>
             Call Centers
            </u>
          </h4>
          <h5 class="subheader white stat-number mb02">
            400
          </h5>
          <p>
            seats, domestic and abroad
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="large-6 column">
  
    <h4 class="subheader text-center" style="color:#333;">Company statistics</h4>
  <h3>
  We've done the math.</h3> 
  <p>
  Industry-accepted independent auditors and research sources, coupled with Acquinity's internal data and metrics teams, consistently report traffic for our web, email and call center properties.
  </p>
  <a href="#" class="button radius">Learn more about Acquinity</a>
  <div class="spacing row"></div>
</div>

<?php

}

function statBarHome(){
?>
<div class="large-12 whitebg">
<div class="content brandwrap row twelve ">
  <div class="main large-12 columns" >
    <div class="brand-bar clearboth" >
      <div  id="brand-logo-case" class="brand-bar-extension" >
        <div id="brandslider" class="brand-bar-content brand-color-back">
          <?php statBarContent(); ?>
        </div>
      </div>
    </div>    
  </div>
</div>  
</div>
<?php
}
?>