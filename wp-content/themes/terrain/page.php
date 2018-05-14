    <?php get_header(); ?>
    <div class="contain">

      <div class="row">

      	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
				<?php comments_template( '', true ); ?>
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>
        </div><!-- /.blog-main -->

        
      <?php get_footer(); ?>
      </div><!-- /.row -->
      
