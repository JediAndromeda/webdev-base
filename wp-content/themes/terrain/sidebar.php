        
          
  <div class="sidebar-module">
    <?php wp_nav_menu( array( 'theme_location' => 'side-menu', 'container_class' => 'sidemenuclass' ) ); 
    ?> 
  </div>
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- #primary-sidebar -->
<?php endif; ?>
        <!-- /.navbar -->