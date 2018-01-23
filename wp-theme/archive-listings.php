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
    <div class="container" data-ng-controller="listingsCtrl" data-ng-init="filterNum = 1">
       <div class="filters">
            <div class="filter" data-ng-class="{'active' : filterNum == 1}" data-ng-click="tenantFilter = undefined; filterNum = 1">
                <h6>All</h6>
            </div>
            <div class="filter" data-ng-class="{'active' : filterNum == 2}" data-ng-click="tenantFilter = { acf : { tenant_type : 'Multi-Tenant' }}; filterNum = 2">
                <h6>Multi-Tenant</h6>
            </div>
            <div class="filter" data-ng-class="{'active' : filterNum == 3}" data-ng-click="tenantFilter = { acf : { tenant_type : 'Single-Tenant' }}; filterNum = 3">
                <h6>Single-Tenant</h6>
            </div>
        </div>
        <div class="listings-container">
	    <div class="listing {{ listing.acf.sale_status | spaceless }}" data-ng-repeat="listing in listings | filter: tenantFilter">
		<a data-ng-href="{{ listing.link }}">
		    <div class="image" data-ng-style="{'background-image':'url( {{ listing.acf.primary_photo.sizes.large }} )'}">
			<h5 ng-bind-html="listing.acf.sale_status | preserveHtml"></h5>
		    </div>
                </a>
                <h4 ng-bind-html="listing.title.rendered | preserveHtml"></h4>
		<div class="text-row">
                    <p>{{ listing.acf.price | preserveHtml }}</p>
                    <p class="cap-rate">Cap Rate: {{ listing.acf.cap_rate | preserveHtml }}</p>
                </div>
                <p>{{ listing.acf.street_address | preserveHtml }}<br>{{ listing.acf.city_state | preserveHtml }}</p>
		<a class="learn-more" data-ng-href="{{ listing.link }}">Learn More</a>
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