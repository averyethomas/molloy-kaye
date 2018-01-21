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
    <div class="container" data-ng-controller="listingsCtrl">
<?php	if( have_rows('stats') ):
?>
	<div class="stats">
	
<?php   while ( have_rows('stats') ) : the_row();
	$icon = get_sub_field('icon');
?>

	    <div class="stat">
		<div class="text">
		    <h2><?php the_sub_field('number'); ?></h2>
		    <h6><?php the_sub_field('description'); ?></h6>
		</div>
		<img src="<?php echo $icon['url'] ?>" />
	    </div>

<?php    endwhile;
?>
	</div>
<?php 	endif;
?>
	<div class="filters" data-ng-init="filterNum = 1">
            <div class="filter" data-ng-class="{'active' : filterNum == 1}" data-ng-click="tenantFilter = undefined; filterNum = 1">
                <h6>All</h6>
            </div>
            <div class="filter" data-ng-class="{'active' : filterNum == 2}"  data-ng-click="tenantFilter = { acf : { tenant_type : 'Multi-Tenant' }}; filterNum = 2">
                <h6>Multi-Tenant</h6>
            </div>
            <div class="filter" data-ng-class="{'active' : filterNum == 3}" data-ng-click="tenantFilter = { acf : { tenant_type : 'Single-Tenant' }}; filterNum = 3">
                <h6>Single-Tenant</h6>
            </div>
	    <div class="filter" data-ng-class="{'active' : filterNum == 4}" data-ng-click="tenantFilter = { acf : { tenant_type : 'JV Capital Facilitation' }}; filterNum = 4">
		<h6>JV Capital Facilitation</h6>
	    </div>
        </div>
        <div class="listings-container">
            <div class="listing closed" data-ng-repeat="listing in closedListings | filter: tenantFilter">
                <div class="image" data-ng-style="{'background-image':'url( {{ listing.acf.primary_photo.sizes.large }} )'}">
		    <h5 ng-bind-html="listing.acf.sale_status | preserveHtml"></h5>
                </div> 
                <h4 ng-bind-html="listing.title.rendered | preserveHtml"></h4>
                <p>{{ listing.acf.street_address | preserveHtml }}<br>{{ listing.acf.city_state | preserveHtml }}</p>
            </div>

        </div>
	<div class="toTop" id="scrollUp" data-ng-click="scrollToTop();">
	    <i class="fa fa-chevron-up" aria-hidden="true"></i>
	</div>
    </div>
</div>
<?php

    get_footer();
    
?>