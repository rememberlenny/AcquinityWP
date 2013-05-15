<?php 
if(get_field('logo_images', '36')):
  $image = "";
  $avcimageid = "";
  while(has_sub_field('logo_images', '36')): 
    echo '<li>'; 
    $avcimageid = get_sub_field('logo_image_file', '36'); 
    $the_image = wp_get_attachment_image( $avcimageid );
    echo $the_image; 
    echo '</li>'; 
  endwhile; 
endif;
?>