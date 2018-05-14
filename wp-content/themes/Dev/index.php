    <?php get_header(); ?>
    <div class="contain">

      <div class="row">
        
        <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
              
              get_template_part( 'content', get_post_format() );
  
            endwhile; endif; 
        ?>

        
        </div><!-- /.blog-main -->
        <div class="row">
          <?php get_footer(); ?>
        </div>
      </div><!-- /.contain -->

