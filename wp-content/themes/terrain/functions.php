<?php
/* 
  Cat's Functions for Wordpress
  Version: 0.1
  Notes: Just practicing and learning, I'll add a better description once I know what it will do!


*/

if ( ! function_exists( 'terrain_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function terrain_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on _Beau, use a find and replace
   * to change 'terrain' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'terrain', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'terrain' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'terrain_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support( 'custom-logo', array(
    'height'      => 250,
    'width'       => 250,
    'flex-width'  => true,
    'flex-height' => true,
  ) );
  // Support Featured Images
add_theme_support( 'post-thumbnails' );

}
endif;
add_action( 'after_setup_theme', 'terrain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function terrain_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'terrain_content_width', 640 );
}
add_action( 'after_setup_theme', 'terrain_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function terrain_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'terrain' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'terrain' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'terrain_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function startwordpress_scripts() {
  //wp_enqueue_style( 'normalise', get_template_directory_uri() . '/css/normalize.css' );

wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');

//script for keyboard navigation from _s
wp_enqueue_script( 'terrain-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
//script for nav improvement from _s
wp_enqueue_script( 'terrain-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
//comment style changes based on page type
  if ( is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );

}
add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
   require get_template_directory() . '/inc/jetpack.php';
 }


// Add Google Fonts
function enque_google_fonts() {
        wp_register_style('Megrim', 'https://fonts.googleapis.com/css?family=Megrim');
        wp_enqueue_style( 'Megrim');
        wp_register_style('Poiret One', 'https://fonts.googleapis.com/css?family=Poiret+One');
        wp_enqueue_style( 'Poiret One');
    }

add_action('wp_print_styles', 'enque_google_fonts');

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function cd_add_editor_styles() {
 add_editor_style( get_stylesheet_uri() );
}
// WordPress Titles

// Theme Settings
function custom_settings_add_menu() {
  add_theme_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Theme Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields( 'section' );
           do_settings_sections( 'theme-options' );      
           submit_button(); 
       ?>          
    </form>
  </div>
<?php }

// Twitter
function setting_twitter() { ?>
  <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }
function setting_aboutme() { ?>
  <input type="textarea" name="aboutme" id="aboutme" value="<?php echo get_option( 'aboutme' ); ?>" />
<?php }
function setting_biopic() { ?>
  <input type="image" name="biopic" id="biopic" value="<?php echo get_option( 'biopic' ); ?>" />
<?php }
function setting_section1title() { ?>
  <input type="textarea" name="section1title" id="section1title" value="<?php echo get_option( 'section1title' ); ?>" />
<?php }
function setting_section2title() { ?>
  <input type="textarea" name="section2title" id="section2title" value="<?php echo get_option( 'section2title' ); ?>" />
<?php }
function setting_section3title() { ?>
  <input type="textarea" name="section3title" id="section3title" value="<?php echo get_option( 'section3title' ); ?>" />
<?php }
function setting_catagory1() { ?>
  <input type="textarea" name="catagory1" id="catagory1" value="<?php echo get_option( 'catagory1' ); ?>" />
<?php }

function setting_catagory2() { ?>
  <input type="textarea" name="catagory2" id="catagory2" value="<?php echo get_option( 'catagory2' ); ?>" />
<?php }

function setting_catagory3() { ?>
  <input type="textarea" name="catagory3" id="catagory3" value="<?php echo get_option( 'catagory3' ); ?>" />
<?php }

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
  add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );  
  add_settings_field( 'aboutme', 'BIO', 'setting_aboutme', 'theme-options', 'section' ); 
  add_settings_field( 'biopic', 'Bio Pic', 'setting_biopic', 'theme-options', 'section' );  
  add_settings_field( 'section1title', 'Section One', 'setting_section1title', 'theme-options', 'section' );  
  add_settings_field( 'section2title', 'Section Two', 'setting_section2title', 'theme-options', 'section' );  
  add_settings_field( 'section3title', 'Section Three', 'setting_section3title', 'theme-options', 'section' );  
  add_settings_field( 'catagory1', 'Catagory One', 'setting_catagory1', 'theme-options', 'section' );  
  add_settings_field( 'catagory2', 'Catagory Two', 'setting_catagory2', 'theme-options', 'section' );  
  add_settings_field( 'catagory3', 'Catagory Three', 'setting_catagory3', 'theme-options', 'section' );  
  register_setting( 'section', 'section1title' );
  register_setting( 'section', 'section2title' );
  register_setting( 'section', 'section3title' );
  register_setting( 'section', 'catagory1' ); 
  register_setting( 'section', 'catagory2' ); 
  register_setting( 'section', 'catagory3' ); 
  register_setting( 'section', 'aboutme' );
  register_setting( 'section', 'twitter' );
  register_setting( 'section', 'github' );
}
add_action( 'admin_init', 'custom_settings_page_setup' );

function setting_github() { ?>
  <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />

<?php }


/*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );


//add custom menu support
function register_my_menus() {
  register_nav_menus(
    array(
      'side-menu' => __( 'Sidebar Menu', 'terrain' ),
      'mini-menu' => __( 'Mini Menu','terrain' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li> </li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li> </li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}


function fb_add_body_class( $class ) {
  if ( ! is_tax() )
    return $class;
  $tax   = get_query_var( 'taxonomy' );
  $term  = $tax . '-' . get_query_var( 'term' );
  $class = array_merge( $classes, array( 'taxonomy-archive', $tax, $term ) );
  return $class;
}
add_filter( 'body_class', 'fb_add_body_class' ); // or post_class as hook
