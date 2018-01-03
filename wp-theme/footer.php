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
      <small><?php if (get_theme_mod('address') ): echo get_theme_mod('address'); endif; ?><span class="divide">|</span><a href="tel:<?php if (get_theme_mod('phone') ): echo get_theme_mod('phone'); endif; ?>">Main: <?php if (get_theme_mod('phone') ): echo get_theme_mod('phone'); endif; ?></a><span class="divide">|</span><a href="tel:<?php if (get_theme_mod('fax') ): echo get_theme_mod('fax'); endif; ?>">Fax: <?php if (get_theme_mod('fax') ): echo get_theme_mod('fax'); endif; ?></a></small>
      <small>&copy; Copyright <?php echo date("Y"); ?>, <?php bloginfo('name'); ?></small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>