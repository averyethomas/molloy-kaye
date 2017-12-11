<?php
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
        <div class="listings-container" data-ng-controller="listingsCtrl">
	    <div class="listing {{ item.acf.status | lowercase }}" data-ng-repeat="item in listingsData">
                <a data-ng-href="{{ item.slug }}">
                   <div class="image" data-ng-style="{'background-image': 'url(' + item.acf.primary_photo.url + ')'}">
                        <h5>{{ item.acf.status }}</h5>
                    </div> 
                </a>
                <h4 data-ng-bind-html="item.title.rendered | preserveHtml"></h4>
                <div class="text-row">
                    <p>{{ item.acf.price }}</p>
                    <p class="cap-rate">Cap Rate: {{ item.acf.cap_rate }}</p>
                </div>
                <p>{{ item.acf.street_address }}<br>{{ item.acf.city_state }}</p>
                <a class="learn-more" data-ng-href="{{ item.slug }}">Learn More</a>
            </div>
	</div>
    </div>
</div>
  
<?php

    endif;
    
?>
<?php

    get_footer();
    
?>