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
    </div>
    <div class="intro">
        <div class="container">
            <h1><?php bloginfo('name'); ?></h1>
            <h6><?php the_field('introduction'); ?></h6>
        </div>
    </div>
    <div class="container">
        <div class="listings">
            
            <?php $objects = get_field('featured_listings');

                if( $objects ): ?>
            
                <h3>Featured Listings</h3>
                
                
                <div class="listings-container">
                
                <?php while ( have_rows('featured_listings') ) : the_row(); ?>
                
 
                    <?php $post_object = get_sub_field('featured_listing'); ?>
 
                    <?php if( $post_object ): ?>
 
                        <?php $post = $post_object; setup_postdata( $post );
                            
                              $status = get_field('status');
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
                                <h6><?php the_field('price'); ?></h6>
                                <p><b>Cap. Rate:</b> <?php the_field('cap_rate'); ?></p>
                            </div>
                            <p><?php the_field('street_address'); ?><br><?php the_field('city_state'); ?></p>
                            <a class="learn-more" href="<?php the_permalink() ?>">Learn More</a>
                        </div>
 
                        <?php wp_reset_postdata(); ?>
 
                    <?php endif; ?>                
 
                <?php endwhile; ?>
                
                </div>
                      
                
                <a class="cta" href="/molloy-kaye-wordpress/listings">View All Listings</a>
            <?php endif;?>           
            <h3>Recently Closed</h3>
            <?php
                $args = array(
                    'post_type'      => 'listings',
                    'post_status'    => 'publish',
                    'meta_key'       => 'status',
                    'meta_value'     => 'Closed',
                    'posts_per_page' => 3,
                );
                   
                $listings = new WP_Query( $args );
                if( $listings->have_posts() ) :
            ?>
                <div class="listings-container">
                <?php
                    while( $listings->have_posts() ) :
                    $listings->the_post();
                              
                    $status = get_field('status');
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
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
                </div>
                
              <?php
              
                  endif;
                  
              ?>
          <a class="cta" href="/molloy-kaye-wordpress/about-us/#closed">View All Closed Listings</a>
        </div>
    </div>
</div>

<?php

    get_footer();
    
?>
