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
            <h1>LOGO</h1>
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
                    
                    <?php $post_object = get_sub_field('featured_listing');
                        
                        if( $post_object ): 
                        
                            // override $post
                            $post = $post_object;
                            setup_postdata( $post );
                            
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
                                <h6><?php the_field('price'); ?></h6>
                                <p><?php the_field('street_address'); ?><br><?php the_field('city_state'); ?></p>
                                <p><b>Cap. Rate:</b> <?php the_field('cap_rate'); ?></p>
                                <a class="learn-more" href="<?php the_permalink() ?>">Learn More</a>
                            </div>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>
                        
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
                        <p><b>Year Built:</b> <?php the_field('year_built'); ?></p>
                        <p><b>GLA:</b> <?php the_field('gla'); ?></p>
                        <!--a class="learn-more" href="<?php the_permalink() ?>">Learn More</a-->
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
