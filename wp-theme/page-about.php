<?php

    /* Template Name: About Page */
    get_header();
    
?>
<div class="page single">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <div class="copy">
            <?php the_field('copy'); ?>
        </div>
        
        <?php
            
            $args = array(
                'post_type'   => 'people',
                'post_status' => 'publish',
                'order'       => 'ASC',
            );
             
            $people = new WP_Query( $args );
            if( $people->have_posts() ) :
            
        ?>
        
        <div class="team-container">
            <h2>Our Team</h2>
        
            <?php
                
                while( $people->have_posts() ) :
                    $people->the_post();
                  
                    $photo = get_field('photo');

            ?>
                    <div class="team-member">
                        <div class="photo" style="background-image: url(<?php echo $photo['url']; ?>);"></div>
                        <h4><?php echo the_title(); ?></h4>
                        <h5><?php the_field('title'); ?></h5>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            ?>
            
        </div>
        <?php endif; ?>
        <div class="listings-container" id="closed">
            <h2>Recently Closed Listings</h2>
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
                <div class="listings-container" >
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
        </div>
    </div>
</div>
<?php

    get_footer();
    
?>
