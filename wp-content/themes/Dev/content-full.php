<div class="article">
  <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium', array('class' => 'featimg'))
} ?>  

 <div class = "posttext">
 	<?php the_content(); ?>
 

<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a><a href="<?php comments_link(); ?>">
	<?php
	printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( 						get_comments_number() ) ); ?>
</a></p>
</div>
</div><!-- /.blog-post -->

          