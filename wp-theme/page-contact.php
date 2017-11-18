<?php

    /* Template Name: Contact Page */
    get_header();
    
?>
<div class="page contact">
  <div class="container">
    <h1><?php echo the_title(); ?></h1>
    <div class="contact-container">
        <div class="contact-info">
            <div class="section">
                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i><small>Address</small></div>
                <div class="links"><a target="_blank" href="https://www.google.com/maps/place/1100+Abernathy+Rd+NE+%23600,+Atlanta,+GA+30328/@33.9341453,-84.354505,17z/data=!3m1!4b1!4m5!3m4!1s0x88f5095567a17af5:0x260b71d3087bb798!8m2!3d33.9341409!4d-84.3523163"><?php the_field('address'); ?></a></div>
            </div>
            <div class="section">
                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i><small>Phone</small></div>
                <div class="links">
                    
                    <?php while(have_rows('contact_person')) : the_row(); ?>
                    
                        <a href="tel:<?php the_sub_field('phone_number'); ?>"><?php the_sub_field('name'); ?>: <?php the_sub_field('phone_number'); ?></a>
                    
                    <?php endwhile; ?>
                    <?php if( get_field('fax') ): ?>
                        <a href='tel:<?php the_field('fax'); ?>'>Fax: <?php the_field('fax'); ?></a>
                    <?php endif; ?> 
                </div>
            </div>
            <div class="section">
                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i><small>Email</small></div>
                <div class="links">
                    
                    <?php while(have_rows('contact_person')) : the_row(); ?>
                    
                        <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                    
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="contact-container">
        <div class="map">
            <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBw-A1LiSCgIeQE9k44YM7g-56TzjNIffg&q=<?php the_field('address'); ?>" allowfullscreen></iframe>
        </div>
        <div class="contact-form">
            <?php echo do_shortcode( '[contact-form-7 id="45" title="Contact Page Form"]' ); ?>
        </div>
    </div>
  </div>
</div>

<?php

    get_footer();
    
?>
