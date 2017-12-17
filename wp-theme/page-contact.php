<?php
    /* Template Name: Contact Page */
    get_header();
    $background = get_field('form_background_image');
?>
<div class="page contact">
    <div class="contact-info">
        <div class="container">
            <h1><?php echo the_title(); ?></h1>
            <div class="item">
                <h6>ADDRESS</h6>
                <a target="_blank" href="https://www.google.com/maps/place/1100+Abernathy+Rd+NE+%23600,+Atlanta,+GA+30328/@33.9341453,-84.354505,17z/data=!3m1!4b1!4m5!3m4!1s0x88f5095567a17af5:0x260b71d3087bb798!8m2!3d33.9341409!4d-84.3523163"><?php the_field('address'); ?></a>
            </div>
<?php   if( get_field('fax') ):
?>
            <div class="item">
                <h6>FAX</h6>
                <a href='tel:<?php the_field('fax'); ?>'><?php the_field('fax'); ?></a>
            </div>
        
<?php   endif;

        while ( have_rows('contact_people') ) : the_row();
        
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
        
        if( get_field('fax') ):
?>
            <div class="item">
                <a class="cta" target="_blank" href="<?php the_field('marketing_flyer')?>">MARKETING FLYER</a>
            </div>
        
<?php   endif;
?>
        </div>
    </div>
    <div class="contact-form" style="background-image: url(<?php echo $background['url']; ?>)">
        <div class="overlay">
    
<?php   echo do_shortcode( '[contact-form-7 id="45" title="Contact Page Form"]' );
?>
        </div>
    </div>
  
<?php   $address = get_field('address');
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
?>  
    <div class="map-container"  data-ng-controller='mapCtrl' data-ng-init='initMap(<?php echo $latitude; ?>, <?php echo $longitude; ?>, "<?php echo get_template_directory_uri(); ?>")'>
        <div class="map" id="contactMap"></div>
    </div>
</div>

<?php

    get_footer();
    
?>
