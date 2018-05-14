<div class="article">
  <a href="<?php the_permalink(); ?>">
  
<?php if (has_post_thumbnail() ): ?>
	<?php the_post_thumbnail('large', array('class' => 'featimg')) ?>

  	<div class="coloroverlay">
  	

<?php else: ?>
	
	<div class="nopictext">   


<?php endif ?>



<h2 class="blog-post-title">
  	<?php the_title(); ?></h2></a>
<p class="blog-post-meta"><?php the_time('jS M, y') ?> <a href="<?php comments_link(); ?>">
	<?php the_tags(); 
	post_class(); 
	printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'terrain' ), number_format_i18n( 						get_comments_number() ) ); ?>
</a></p>

</div>
</div><!-- /.blog-post -->

          