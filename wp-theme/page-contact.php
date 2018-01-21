<?php
    /* Template Name: Contact Page */
    get_header();
    $background = get_field('form_background_image');
?>
<div class="page contact">
    <div class="container">
    <div class="contact-info">
        <div class="container">
            <h1><?php echo the_title(); ?></h1>
        
<?php   while ( have_rows('contact_people') ) : the_row();
        
            $post_object = get_sub_field('person');
            
            if( $post_object ):
            
            $post = $post_object; setup_postdata( $post );
            $titleRows = get_field('titles');
            $firstTitle = $titleRows[0]['title'];
?>
            <div class="item">
                <h6><?php echo the_title(); ?></h6>
                <p><?php echo $firstTitle; ?></p>
                <a href="tel:<?php the_field('direct_phone_number'); ?>"><?php the_field('direct_phone_number'); ?></a>
                <br />
                <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
            </div>
        
<?php       wp_reset_postdata();
            endif;   
        endwhile;
        
        if (get_theme_mod('address') ):
        $address = get_theme_mod('address');
        $searchAddress = str_replace('<br>', '', $address);
        $prepAddr = str_replace(' ','+',$searchAddress);
        $removeSuite = str_replace('Suite 600 ', '', $prepAddr );
        $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$removeSuite.'&sensor=false');
        $output = json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
?>
           <div class="item">
                <h6>ADDRESS</h6>
                <a target="_blank" href="https://www.google.com/maps/place/<?php echo $searchAddress ?>"><?php echo $address ?></a>
            </div>
<?php   endif;
        if (get_theme_mod('phone') ):
?>
            <div class="item">
                <h6>Phone</h6>
                <a href="tel:<?php echo get_theme_mod('phone'); ?>"><?php echo get_theme_mod('phone'); ?></a>
            </div>
            
<?php   endif;
        if (get_theme_mod('fax') ):
?>
            <div class="item">
                <h6>FAX</h6>
                <a href='tel:<?php echo get_theme_mod('fax'); ?>'><?php echo get_theme_mod('fax'); ?></a>
            </div>
<?php endif;
?>
        </div>
    </div>
    <div class="contact-form" style="background-image: url(<?php echo $background['url']; ?>)">
        <div class="overlay">
    
<?php   echo do_shortcode( '[contact-form-7 id="45" title="Contact Page Form"]' );
?>
        </div>
    </div>
    <div class="map-container"  data-ng-controller='mapCtrl' data-ng-init='initMap(<?php echo $latitude; ?>, <?php echo $longitude; ?>, "<?php echo get_template_directory_uri(); ?>")'>
        <div class="map" id="contactMap"></div>
    </div>
</div>
</div>
<?php

    get_footer();
    
?>
