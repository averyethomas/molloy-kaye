<?php
    get_header();
    
?>

<?php
    $args = array(
        'post_type'   => 'listings',
        'post_status' => 'publish',
        'meta_query'  => array(
           
            array(
		'key'	=> 'status',
		'value' => array('Available', 'Under Contract'),
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
        <h1>LISTINGS</h1>
        <div class="filters">
            <div class="filter active">
                <h6>All</h6>
            </div>
            <div class="filter">
                <h6>Multi-Tenant</h6>
            </div>
            <div class="filter">
                <h6>Single-Tenant</h6>
            </div>
        </div>
        <div class="listings-container">
            <?php
                while( $listings->have_posts() ) :
                $listings->the_post();
                
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