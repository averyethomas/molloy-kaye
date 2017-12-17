<?php

/* Template Name: Press Page */
    get_header();
    
?>

<div class="page press">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
    <?php   $categories = get_categories();
                
            foreach ( $categories as $category ): ?>
            
            <div class='category'>
                <h2><?php echo $category->name; ?></h2>
<?php       $args = array(
                'category_name'  => $category->slug,
                'posts_per_page' => 3,
            );
            $catquery = new WP_Query($args);            
            while($catquery->have_posts()) : $catquery->the_post();
?>
                <div class="post"><img src="http://media.cmgdigital.com/shared/img/photos/2011/09/07/2010_WSB_logo.jpg">
                    <div class="text">
                      <h4><?php echo the_title(); ?></h4>
                      <p>This is a snippet of the post that is approximately 120 characters long ...</p><a href="#">Read More</a>
                    </div>
                </div>
                
<?php       endwhile;
?>
                <div class="load-more"><a class="cta">Load More</a></div>
            </div>
            
<?php       endforeach; 
?>
    </div>
</div>
  
<?php

    get_footer();
    
?>