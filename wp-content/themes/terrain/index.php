<?php get_header(); ?>

<div class="contain">
    <div class="firstsection">
      <h1><a id="#sectionone" class="title"> <?php echo get_option('section1title'); ?></a></h1>
      <div class="caption">
      Can we have Bender Burgers again? Then we'll go with that data file! Leela's gonna kill me. Five hours? Aw, man! Couldn't you just get me the death penalty? Check it out, y'all. Everyone who was invited is here.
      <br>
      <br>
      Why did you bring us here? Really?! Belligerent and numerous. I'm sure those windmills will keep them cool. Fry, we have a crate to deliver.
      </div><!--/caption-->
    </div> <!-- /.1section-->
</a>

      <div class="secondsection">
      
        <h1><a id="#sectiontwo" class="title"> <?php echo get_option('section2title'); ?></a></h1>
      
      <div class="row">
      <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
              
              get_template_part( 'content', get_post_format() );
  
            endwhile; endif; 
        ?>
        <?php numeric_posts_nav(); ?>
      </div> <!--/row-->
      </div> <!-- /.2section-->
      <div class="thirdsection">
      <h1><a id="#sectionthree" class="title"> <?php echo get_option('section3title'); ?></a></h1>
    </div> <!-- /.1section-->

  

  <?php get_footer(); ?>
</div> <!--/contain-->