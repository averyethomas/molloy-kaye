<?php
    
    get_header();
    
  
?>
<div class="page listings" data-ng-controller="scrollTopCtrl">
    
<?php	if ( get_theme_mod( 'listings_image' ) ) :
?>
	<div class="hero" style="background-image: url(<?php echo get_theme_mod( 'listings_image' ); ?>);">
	    <div class="overlay">
		<div class="container">
		    <h1>LISTINGS</h1>
		</div>
	    </div>
	</div>

<?php 	else:
?>
	<div class="container">
	    <h1>LISTINGS</h1>
	</div>
	
<?php 	endif;
?>
    <div class="container" data-ng-controller="filterCtrl">
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
	    
<?php	$args = array(
	    'post_type'   => 'listings',
	    'post_status' => 'publish',
	    'posts_per_page' => 12,
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

	while( $listings->have_posts() ) :
	    $listings->the_post();
            $status = get_field('status');
            $statusClass = strtolower(str_replace(' ', '-', $status));
	    $filter = get_field('tenant_type');
	    $filterClass = strtolower(str_replace(' ', '-', $filter));
	    
            $primImage = get_field('primary_photo');
?>
            <div class="listing <?php echo $statusClass; ?> <?php echo $filterClass; ?>">
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
<?php	endwhile;
        wp_reset_postdata();
    endif;
    echo do_shortcode('[ajax_load_more container_type="div" post_type="listings" posts_per_page="6" meta_key="status:status" meta_value="Under Contract:Available" meta_compare="IN:IN" meta_type="CHAR:CHAR" meta_relation="OR"]');
?>
        </div>
	<div class="toTop" id="scrollUp" data-ng-click="scrollToTop();">
	    <i class="fa fa-chevron-up" aria-hidden="true"></i>
	</div>
    </div>
</div>

<?php

    get_footer();
    
?>