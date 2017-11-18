<footer>
  <div class="container">  
    <div class="footerSection">
      <?php if ( get_theme_mod( 'light_logo' ) ) : ?>
 
        <img class="mk-logo" src="<?php echo get_theme_mod( 'light_logo' ); ?>" />
   
      <?php endif; ?>
      <?php if ( get_theme_mod( 'mc_logo' ) ) : ?>
 
        <img class="mm-logo" src="<?php echo get_theme_mod( 'mc_logo' ); ?>" />
   
      <?php endif; ?>
      <small>&copy; Copyright <?php echo date("Y"); ?>, <?php bloginfo('name'); ?></small>
    </div>
  </div>
</footer>
</body>
</html>