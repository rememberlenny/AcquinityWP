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

  <script type="text/javascript" src="//use.typekit.net/hxm2vop.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <style type="text/css">
    .facebook{
      background: url('<?php the_field('linkedin_icon', 'option'); ?>') center center;
      -moz-background-size:100% 100%; /* Old Firefox */
      background-size:100% 100%;
    }
    .linkedin{
      background: url('<?php the_field('facebook_icon', 'option'); ?>') center center;
      -moz-background-size:100% 100%; /* Old Firefox */
      background-size:100% 100%;
    }
    <?php if (is_page('home') ) { ?>

    <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( 36 ), 'single-post-thumbnail' ); ?>

      .masthead-photo {
        background: url("<?php echo $image[0]; ?>") center center no-repeat #FAF8F6;
      }
    <?php endif; ?>
    
    <?php } ?>
  </style>
<?php wp_head(); ?>

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
        <ul class="right">
          <li class="has-form hide-for-medium-down fr">
            <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <div class="row collapse search-box">
                <div class="large-7 columns">
                  <input type="text" value="" name="s" id="s" placeholder="Search">
                </div>
                <div class="large-4 columns">
                  <input type="submit" id="searchsubmit" class="button tiny">

                  </input>
                </div>
              </div>
            </form>
          </li>
        </ul>
      </section>
    </nav>
    <!-- End of Top-Bar -->
  </div>
</div>

<!-- Start the main container -->
<section class="" role="document">