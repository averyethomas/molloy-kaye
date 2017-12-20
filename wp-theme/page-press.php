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
    <?php   $categories = get_categories();
                
            foreach ( $categories as $category ): ?>
            
            <div class='category'>
                <h2><?php echo $category->name; ?></h2>
<?php       $args = array(
                'category_name'  => $category->slug,
                'posts_per_page' => 5,
            );
            $catquery = new WP_Query($args);            
            while($catquery->have_posts()) : $catquery->the_post();
?>
                <div class="post">
<?php               if ( has_post_thumbnail() ):
?>
                        <?php echo the_post_thumbnail('medium'); ?>
<?php endif;
?>
                    <div class="text">
                      <h4><?php echo the_title(); ?></h4>
                      <h6><?php echo get_the_date(); ?></h6>
                      <p><?php the_excerpt(); ?></p>
                      <a href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
                
<?php       endwhile;
?>
                <div class="load-more"><a class="cta">See More</a></div>
            </div>
            
<?php       endforeach; 
?>
    </div>
</div>
  
<?php

    get_footer();
    
?>