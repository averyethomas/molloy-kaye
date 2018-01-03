<footer>
  <div class="container">  
    <div class="footerSection">
      
<?php   if ( get_theme_mod( 'light_logo' ) ) :
?>
 
        <img class="mk-logo" src="<?php echo get_theme_mod( 'light_logo' ); ?>" />
   
<?php   endif;
        if ( get_theme_mod( 'mc_logo' ) ) :
?>
        <img class="mm-logo" src="<?php echo get_theme_mod( 'mc_logo' ); ?>" />
   
<?php   endif;
?>
    </div>
    <div class="footerSection">
      <small><a href="tel:<?php if (get_theme_mod('phone') ): echo get_theme_mod('phone'); endif; ?>"><?php if (get_theme_mod('phone') ): echo get_theme_mod('phone'); endif; ?></a><span class="divide">|</span><?php if (get_theme_mod('address') ): echo get_theme_mod('address'); endif; ?></small>
      <small>&copy; Copyright <?php echo date("Y"); ?>, <?php bloginfo('name'); ?></small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>