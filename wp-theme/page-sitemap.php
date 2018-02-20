<?php
    /* Template Name: Site Map Page */
    get_header();
?>
<div class="page single">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <h3>Pages</h3>
        <ul>
<?php       wp_list_pages(
               array(
                   'exclude' => '',
                   'title_li' => '',
               )
           );
 ?>          
        </ul>
        <h3>People</h3>
        <ul>
<?php   $sitemaplooppeople = new WP_Query( array( 
                        'post_type' => 'people', 
                        'posts_per_page' => -1, 
                        'post_status' => 'publish',
                        'order' => 'ASC'
        ));
        while ( $sitemaplooppeople->have_posts() ) : $sitemaplooppeople->the_post();
?>
            <li>
                <a href="<?php echo get_permalink($post->ID); ?>" rel="dofollow" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </li>
                        
<?php   endwhile;
        wp_reset_query();
?>             
        </ul>
        <h3>Listings</h3>
        <ul>
<?php   $sitemaplooplocations = new WP_Query( array( 
                        'post_type' => 'listings', 
                        'posts_per_page' => -1, 
                        'post_status' => 'publish',
                        'order' => 'ASC'
        ));
        while ( $sitemaplooplocations->have_posts() ) : $sitemaplooplocations->the_post();
?>
            <li>
                <a href="<?php echo get_permalink($post->ID); ?>" rel="dofollow" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </li>
                        
<?php   endwhile;
        wp_reset_query();
?>            
        </ul>
    </div> 
</div>

<?php

    get_footer();
    
?>


