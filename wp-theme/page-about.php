<?php
    /* Template Name: About Page */
    get_header();
    $heroImage = get_field('hero_image');
?>
<div class="page single">
    
<?php   if( $heroImage ):
?>
    <div class="hero" style="background-image: url(<?php echo $heroImage['url']; ?>);">
        <div class="overlay">
            <div class="container">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <?php the_field('copy'); ?>
    </div>

<?php   else:
?>
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <div class="copy">
            <?php the_field('copy'); ?>
        </div>
    </div>  

<?php   endif;

        $args = array(
            'post_type'   => 'people',
            'post_status' => 'publish',
            'order'       => 'ASC',
        );
        $people = new WP_Query( $args );
        
        if( $people->have_posts() ) :
?> 
    <div class="team-container">
        <div class="container">
            <h5 class="underline">Meet The Team</h5>
            <h2>Molloy Kaye Retail Group</h2>
            
<?php       while( $people->have_posts() ) :
                $people->the_post();
                $photo = get_field('photo');
?>
                <a href='<?php echo the_permalink(); ?>' class="team-member">
                    <div class="photo" style="background-image: url(<?php echo $photo['url']; ?>);">
                        <div class="overlay">
                            <h6>READ BIO</h6>
                        </div>
                    </div>
                    <h4><?php echo the_title(); ?></h4>
                    
<?php   $titleRows = get_field('titles');
        $firstTitle = $titleRows[0]['title'];
?>
                    <h6><?php echo $firstTitle; ?></h6>
                </a>
                
<?php       endwhile;
            wp_reset_postdata();
            
            if( get_field('marketing_flyer')) :
?>
            <div class="item">
                <a class="cta" target="_blank" href="<?php the_field('marketing_flyer')?>">MKRG Profile</a>
            </div>
<?php       endif;
?>
        </div>
    </div>    
<?php   endif;
?>
    <div class="container">
        <div class="listings-container" id="closed">
            <h2>Recently Closed</h2>
<?php   $closed_objects = get_field('featured_closed_listings');
        if( $closed_objects ):
        while ( have_rows('featured_closed_listings') ) : the_row();

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
            <a class="cta" href="/track-record">View Track Record</a>
        </div>
    </div>
</div>
<?php

    get_footer();
    
?>
