<!-- Homepage for blog content, as a single colomn thang -->
<?php get_header(); ?>

<div class="contain">
      
      <div class="row">
      	<div class="content">
      <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
              
              get_template_part( 'content-full', get_post_format() );
  
            endwhile; endif; 
        ?>
        <?php numeric_posts_nav(); ?>
      </div> <!--/row-->
      
      
  

  <?php get_footer(); ?>
</div> <!--/contain-->