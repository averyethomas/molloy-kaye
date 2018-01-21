<?php

/* Template Name: Press Page */
    get_header();
        $heroImage = get_field('hero_image');

    
?>

<div class="page press">
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
?>
    <div class="container">
<?php   if ( have_rows('newsroom_category') ):
            while ( have_rows('newsroom_category') ) : the_row();
?>            
            <div class='category'>
                <h2><?php the_sub_field('category_title'); ?></h2>
<?php   if ( have_rows('article') ):  
            while ( have_rows('article') ) : the_row();
?> 
                <div class="post">
<?php               $photo = get_sub_field('image');

                    if ( $photo ):
?>
                       <img src="<?php echo $photo; ?>" />
<?php endif;
?>
                    <div class="text">
                      <h4><?php the_sub_field('title'); ?></h4>
                      <h6><?php the_sub_field('date'); ?></h6>
                      <p><?php the_sub_field('summary'); ?></p>
                      <a target="_blank" href="<?php the_sub_field('link'); ?>">Read More</a>
                    </div>
                </div>
                
<?php       endwhile;
        endif; 
?>               
            </div>
<?php       endwhile;
        endif; 
?>
    </div>
</div>
  
<?php

    get_footer();
    
?>