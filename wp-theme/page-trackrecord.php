<?php

    /* Template Name: Track Record Page */

    get_header();
    
    $heroImage = get_field('hero_image');
?>
<div class="page listings" data-ng-controller="scrollTopCtrl">

<?php	if( $heroImage ):
?>
	<div class="hero" style="background-image: url(<?php echo $heroImage['url']; ?>);">
	    <div class="overlay">
		<div class="container">
		    <h1><?php echo the_title(); ?></h1>
		</div>
	    </div>
	</div>
<?php 	else:
?>
	<div class="container">
	    <h1><?php the_title(); ?></h1>
	</div>
<?php 	endif;
?>
    <div class="container">
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
	    <div class="filter">
		<h6>JV Capital Facilitation</h6>
	    </div>
        </div>
        <div class="listings-container">
<?php	$args = array(
	    'post_type'   => 'listings',
	    'post_status' => 'publish',
	    'posts_per_page' => 6,
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
<?php	endwhile;
        wp_reset_postdata();
    endif;
    echo do_shortcode('[ajax_load_more container_type="div" post_type="listings" posts_per_page="6" meta_key="status" meta_value="Closed" meta_compare="IN" meta_type="CHAR"]');

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