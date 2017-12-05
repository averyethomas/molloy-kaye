<?php

    get_header();
    
    while ( have_posts() ) : the_post();

?>
<div class="page single">
    
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <?php echo the_content(); ?>
    </div>
    

</div>

<?php
    endwhile;
    get_footer();
    
?>
