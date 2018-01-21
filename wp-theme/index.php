<?php

    /* Template Name: Home Page */
    get_header();
    
?>

<div class="page home has-hero">
    
<?php
    
    $heroImage = get_field('hero_image');
 
?>    

    <div class="hero" style="background-image: url(<?php echo $heroImage['url']; ?>);">
        <div class="overlay"></div>
        <div class="container text">
            <?php if ( get_theme_mod( 'light_logo' ) ) : ?>
 
                <img src="<?php echo get_theme_mod( 'light_logo' ); ?>" />
   
            <?php endif; ?>
            
            <h2><?php bloginfo('description'); ?></h2>
        </div>
        <div class="down-arrow">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
    </div>
    <div class="intro">
        <div class="container">
            <h1><?php bloginfo('name'); ?></h1>
            <p><?php the_field('introduction'); ?></p>
        </div>
    </div>
    <div class="container">
        <div class="listings">
            
            <?php $objects = get_field('featured_listings');

                if( $objects ): ?>
            
                <h3 class="underline">Featured Listings</h3>
                
                
                <div class="listings-container">
                
                <?php while ( have_rows('featured_listings') ) : the_row(); ?>
                
 
                    <?php $post_object = get_sub_field('featured_listing'); ?>
 
                    <?php if( $post_object ): ?>
 
                        <?php $post = $post_object; setup_postdata( $post );
                            
                              $status = get_field('sale_status');
                              $statusClass = strtolower(str_replace(' ', '-', $status));
                              $primImage = get_field('primary_photo');
                        
                        ?>
                        
                        <div class="listing <?php echo $statusClass ?>">
                            <a href="<?php the_permalink() ?>">
                                <div class="image" style="background-image: url(<?php echo $primImage['url'] ?>);">
                                     <h5><?php echo $status ?></h5>
                                </div> 
                            </a>
                            <h4><?php echo the_title(); ?></h4>
                            <div class="text-row">
                                <p><?php the_field('price'); ?></p>
                                <p class="cap-rate">Cap Rate: <?php the_field('cap_rate'); ?></p>
                            </div>
                            <p><?php the_field('street_address'); ?><br><?php the_field('city_state'); ?></p>
                            <a class="learn-more" href="<?php the_permalink() ?>">Learn More</a>
                        </div>
 
                        <?php wp_reset_postdata(); ?>
 
                    <?php endif; ?>                
 
                <?php endwhile; ?>
                
                </div>
                      
                
                <a class="cta" href="/molloy-kaye-wordpress/listings">View Listings</a>
            <?php endif;?>
<?php   $closed_objects = get_field('featured_closed_listings');
        if( $closed_objects ):
?>
        <h3 class="underline">Featured Closed Listings</h3>
        
        <div class="listings-container">

<?php   while ( have_rows('featured_closed_listings') ) : the_row();

        $closed_post_object = get_sub_field('featured_closed_listing');
        
        if( $closed_post_object ):
        
        $post = $closed_post_object;
        setup_postdata( $post );
        
            $status = get_field('sale_status');
            $statusClass = strtolower(str_replace(' ', '-', $status));
            $primImage = get_field('primary_photo');
?>
                <div class="listing <?php echo $statusClass ?>">
                    <div class="image" style="background-image: url(<?php echo $primImage['url'] ?>);">
                        <h5><?php echo $status ?></h5>
                    </div> 
                    <h4><?php echo the_title(); ?></h4>
                    <p><?php the_field('street_address'); ?><br><?php the_field('city_state'); ?></p>
                </div>
<?php       wp_reset_postdata();
        endif;
        endwhile;
        endif;
?>
                
            </div>
            <a class="cta" href="/molloy-kaye-wordpress/track-record">View Track Record</a>
        </div>
    </div>
</div>

<?php

    get_footer();
    
?>
