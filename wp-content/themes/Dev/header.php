<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    
  <?php wp_head();?>
  </head>

  <body>

    
      <div class="navbar">
        <?php get_sidebar(); ?>
      </div>
    

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title"><a href="<?php echo get_bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
        
        <p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
      </div>
    </div>