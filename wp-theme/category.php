<?php

    get_header();
    
?>

<div class="page category">
    <div class="container">
	
<?php 	if ( have_posts() ) :
?>
	<h1><?php single_cat_title(); ?></h1>
	
<?php 	while( have_posts() ) : the_post(); 
?>
	<div class="post">
	    
<?php	    if ( has_post_thumbnail() ):
		echo the_post_thumbnail('medium');
	    endif;
?>
	    <div class="text">
		<h4><?php echo the_title(); ?></h4>
                <h6><?php echo get_the_date(); ?></h6>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </div>
	
<?php	endwhile;
	endif;
?>
    </div>
</div>
<?php

    get_footer();
    
?>