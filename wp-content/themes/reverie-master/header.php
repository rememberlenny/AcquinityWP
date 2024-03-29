<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>">

  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width" />

  <!-- Favicon and Feed -->
  <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

  <!--  iPhone Web App Home Screen Icon -->
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

  <!-- Enable Startup Image for iOS Home Screen Web App -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

  <!-- Startup Image iPad Landscape (748x1024) -->
  <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
  <!-- Startup Image iPad Portrait (768x1004) -->
  <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
  <!-- Startup Image iPhone (320x460) -->
  <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

  <script type="text/javascript">
    (function() {
      var config = {
        kitId: 'hxm2vop',
        scriptTimeout: 3000
      };
      var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
    })();
  </script>
  
<?php 
  lkbg_head_style();
  wp_head(); 
?>

</head>

<body <?php body_class(); ?>>

<div id="bg">
  <div id="bgContent">
    <div id="bgLeft">
      <div id="bgLeftExtension">
        <div id="bgLeftContent">
        </div>
      </div>
    </div>
    <div id="bgRight">
      <div id="bgRightExtension">
        <div id="bgRightContent">
        </div>
      </div>
    </div>
  </div>
</div>
    
<div class="container">
    
<div class="top-nav-wrapper twelve">
  <div class="row top-nav">
    <!-- Starting the Top-Bar -->
    <nav class="top-bar">
        <ul class="title-area">
            <li class="name">
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img class="logo" src="<?php the_field('site_logo', 'option'); ?>" alt="">
                <?php //bloginfo( 'name' ); ?>
              </a></h1>
            </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => false,
                'depth' => 0,
                'items_wrap' => '<ul class="left">%3$s<li class="divider"></li></ul>',
                'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
                'walker' => new reverie_walker( array(
                    'in_top_bar' => true,
                    'item_type' => 'li'
                ) ),
            ) );
        ?>
      </section>
    </nav>
    <!-- End of Top-Bar -->
  </div>
</div>

<!-- Start the main container -->
<section class="sectioned" role="document">