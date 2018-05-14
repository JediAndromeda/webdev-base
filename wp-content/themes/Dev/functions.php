<?php
/* 
	Cat's Functions for Wordpress
	Version: 0.1
	Notes: Just practicing and learning, I'll add a better description once I know what it will do!
*/

// Add scripts and stylesheets
function startwordpress_scripts() {
	//wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
  wp_enqueue_style( 'normalise', get_template_directory_uri() . '/css/normalize.min.css' );
  wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
				wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
				wp_enqueue_style( 'OpenSans');
		}

add_action('wp_print_styles', 'startwordpress_google_fonts');


// WordPress Titles
add_theme_support( 'title-tag' );

// Theme Settings
function custom_settings_add_menu() {
  add_menu_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
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

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
  add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );  
	add_settings_field( 'aboutme', 'BIO', 'setting_aboutme', 'theme-options', 'section' ); 
  add_settings_field( 'biopic', 'Bio Pic', 'setting_biopic', 'theme-options', 'section' );  
  register_setting( 'section', 'twitter' ); 
  register_setting( 'section', 'aboutme' );
  register_setting( 'section', 'twitter' );
 	register_setting( 'section', 'github' );
}
add_action( 'admin_init', 'custom_settings_page_setup' );

function setting_github() { ?>
  <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />

<?php }

// Custom Post Type
function create_my_custom_post() {
  register_post_type( 'my-custom-post',
      array(
      'labels' => array(
          'name' => __( 'My Custom Post' ),
          'singular_name' => __( 'My Custom Post' ),
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'custom-fields'
      )
  ));
}
add_action( 'init', 'create_my_custom_post' );

//You Post - Also a custom post but working through the next stage of the tute
function create_post_your_post() {
  register_post_type( 'your_post',
    array(
      'labels'       => array(
        'name'       => __( 'Your Post' ),
      ),
      'public'       => true,
      'hierarchical' => true,
      'has_archive'  => true,
      'supports'     => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
      ), 
      'taxonomies'   => array(
        'post_tag',
        'category',
      )
    )
  );
  register_taxonomy_for_object_type( 'category', 'your_post' );
  register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}
add_action( 'init', 'create_post_your_post' );

// Support Search Form
add_theme_support( 'html5', array( 'search-form' ) );
// Support Featured Images
add_theme_support( 'post-thumbnails' );


//add custom menu support
function register_my_menus() {
  register_nav_menus(
    array(
      'side-menu' => __( 'Sidebar Menu' ),
      'mini-menu' => __( 'Mini Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
