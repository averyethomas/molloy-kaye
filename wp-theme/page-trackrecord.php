<?php

    /* Template Name: Track Record Page */

    get_header();
    
?>

<?php
    $args = array(
        'post_type'   => 'listings',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'  => array(
           
            array(
		'key'	=> 'status',
		'value' => array('Closed'),
	    ),
	    array(
		'key'	=> 'tenant_type',
		'value'	=> array('Single-Tenant', 'Multi-Tenant'),
	    ),
	),
     );
     
    $listings = new WP_Query( $args );
    if( $listings->have_posts() ) :
?>
<div class="page listings">
    <div class="container">
        <h1>Track Record</h1>
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
    </div>
</div>
  
<?php

    endif;
    
?>
<?php

    get_footer();
    
?>