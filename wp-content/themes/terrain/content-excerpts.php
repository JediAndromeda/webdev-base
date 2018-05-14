<div class="article">
  <a href="<?php the_permalink(); ?>">
  
<?php if (has_post_thumbnail() ): ?>
	<?php the_post_thumbnail('large', array('class' => 'featimg-thumb')) ?>

  	<div class="coloroverlay">
  	

<?php else: ?>
	
	<div class="nopictext">   


<?php endif ?>



<h2 class="blog-post-title">
  	<?php the_title(); ?></h2></a>
<p class="blog-post-meta"><?php the_time('jS M, y') ?>
	
</p>

</div>
</div><!-- /.blog-post -->

          