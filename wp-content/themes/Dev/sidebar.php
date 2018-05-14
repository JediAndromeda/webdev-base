        <div class="navbar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
             <?php echo get_option('mepic'); ?>
              <p><?php echo get_option('aboutme'); ?> </p>
          </div>
          <div class="sidebar-module">
            <?php wp_nav_menu( array( 'theme_location' => 'side-menu', 'container_class' => 'sidemenuclass' ) ); 
            ?> 
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="<?php echo get_option('github'); ?>">GitHub</a></li>
              <li><a href="<?php echo get_option('twitter'); ?>">Twitter</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->