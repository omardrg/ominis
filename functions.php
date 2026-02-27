<?php
/**
 * ominis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ominis
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2.0.2' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ominis_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ominis, use a find and replace
		* to change 'ominis' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ominis', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ominis' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ominis_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for wide alignment.
	add_theme_support( 'align-wide' );

}
add_action( 'after_setup_theme', 'ominis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ominis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ominis_content_width', 640 );
}
add_action( 'after_setup_theme', 'ominis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ominis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ominis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ominis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Social', 'ominis' ),
			'id'            => 'social-1',
			'description'   => esc_html__( 'Add widgets here.', 'ominis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer', 'ominis' ).' 1',
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'ominis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer', 'ominis' ).' 2',
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'ominis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer', 'ominis' ).' 3',
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'ominis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
}
add_action( 'widgets_init', 'ominis_widgets_init' );

/**
 * Add Posts Formats.
 */
add_theme_support( 'post-formats', array( 'gallery' ) );

/**
 * Enqueue scripts and styles.
 */
function ominis_scripts() {
	wp_enqueue_style( 'ominis-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ominis-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bootstrap-5-3-8', get_template_directory_uri() . '/assets/bootstrap-5.3.8-dist/css/bootstrap.min.css',array(),null);
	wp_enqueue_style( 'fancybox-6-1-11', get_template_directory_uri() . '/assets/fancybox-6.1.11/fancybox.css',array(),null);
	wp_enqueue_style( 'fancybox-compactmode-6-1-11', get_template_directory_uri() . '/assets/fancybox-6.1.11/fancybox.compactmode.css',array(),null);
	wp_enqueue_style( 'fontawesome_7-2-0', get_template_directory_uri() . '/assets/fontawesome-free-7.2.0-web/css/all.min.css',array(),null);
	
	wp_enqueue_style( 'ominis-custom-style', get_template_directory_uri() . '/ominis.css', array(), '2.0.0' );
	wp_enqueue_style( 'ominis-content-home', get_template_directory_uri() . '/layouts/content-home.css', array(), '2.0.0' );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootstrap_js-5-3-8', get_template_directory_uri() . '/assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js', array(), null, true );
	wp_enqueue_script( 'fancybox_js-6-1-11', get_template_directory_uri() . '/assets/fancybox-6.1.11/fancybox.umd.js', array(), null, true );
	wp_enqueue_script( 'fancybox_compactmode_js-6-1-11', get_template_directory_uri() . '/assets/fancybox-6.1.11/fancybox.compactmode.umd.js', array(), null, true );
	wp_enqueue_script( 'fancybox_es_es_js-6-1-11', get_template_directory_uri() . '/assets/fancybox-6.1.11/l10n/es_ES.umd.js', array(), null, true );
	wp_enqueue_script( 'isotope_js-3-0-6', get_template_directory_uri() . '/assets/isotope-3.0.6/isotope.pkgd.min.js', array(), null, true );
	wp_enqueue_script( 'imagesloaded_js-5-0-0', get_template_directory_uri() . '/assets/imagesloaded-5.0.0/imagesloaded.pkgd.min.js', array(), null, true );

	//wp_enqueue_script( 'ominis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'functions_js', get_template_directory_uri() . '/js/functions.js', array(), '2.0.7', true );
}
add_action( 'wp_enqueue_scripts', 'ominis_scripts' );

/**
 * We customized the menu by adding the option to customize the classes to the <li>.
 */
function add_additional_class_on_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * We customized the menu by adding the option to customize the classes to the <a>.
 */
function add_additional_class_on_a($classes, $item, $args) {
    if($args->add_a_class) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

/**
 * We add the BS class "active" to the active link<a>.
 */
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

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
 * Register block styles.
 */
require get_template_directory() . '/inc/block-styles.php';

/**
 * Register block patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';

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

/**
 * I'm restoring the custom options.
 */
$dataOminis = get_option('ominis_theme_options');


/**
 * I'm adding the theme instructions to the menu.
 */
add_action('admin_menu', 'ominis_menu');

/**
 * Config menu item
 */
function ominis_menu(){
	add_theme_page( 'Ominis Instrucciones', 'O Tema', 'manage_options', 'ominis-tema', 'ominis_instrucciones' );
}

/**
 * Contents of the instructions.
 */
function ominis_instrucciones() {
?>
	<div class="wrap">
		<h2><?php _e('Ominis Theme: Instructions','ominis');?>  <small>2.0.2</small></h2>
		<h3><?php _e('Posts','ominis');?></h3>
		<p><?php _e('The Ominis theme is optimized to display the latest posts on the homepage. To display them correctly, you need to configure the following for each post:','ominis');?></p>
		<ol>
			<li>
				<p><?php _e('<strong>Featured image</strong>: Attach an image with a size of 642px wide by 800px high.','ominis');?></p>
			</li>
			<li>
				<p><?php _e('<strong>Extract</strong>: Add a short descriptive text.','ominis');?></p>
			</li>
		</ol>
		<p><?php _e('In addition, there are two formats available for posts:','ominis');?></p>
		<ol>
			<li>
				<p><?php _e('<strong>Standard</strong>: default format.','ominis');?></p>
			</li>
			<li>
				<p><?php _e('<strong>Gallery (optimized for the new Guternberg editor)</strong>: Add each image inside an "Image" block to create a mosaic of images.','ominis');?></p>
				<p><?php _e('In the "Advanced" section of each block, add additional CSS classes as if they were tags to create a filter menu at the beginning of the gallery.','ominis');?></p>
			</li>
		</ol>
		<h3><?php _e('Pages','ominis');?></h3>
		<p><?php _e('There are three templates available for the pages:','ominis');?></p>
		<ol>
			<li>
				<p><?php _e('<strong>Default template</strong>: default format.','ominis');?></p>
			</li>
			<li>
				<p><?php _e('<strong>Mosaic (optimized for the new Guternberg editor)</strong>: Add each image within an "Image" block to create a mosaic of images.','ominis');?></p>
			</li>
			<li>
				<p><?php _e('<strong>Mosaic with filters (optimized for the new Guternberg editor)</strong>: Add each image inside an "Image" block to create a mosaic of images.','ominis');?></p>
				<p><?php _e('In the "Advanced" section of each block, add additional CSS classes as if they were tags to create a filter menu at the beginning of the gallery.','ominis');?></p>
			</li>
		</ol>
		<h3><?php _e('Social networks','ominis');?></h3>
		<p><?php echo sprintf( __( 'In the menu <a href="%1$s" target="_blank">Appearance &gt; Customize: Social Networks</a>, you add the links to the social networks you want to display in the main menu.', 'ominis' ), admin_url('customize.php?autofocus[section]=rrss') ); ?></p>
		<p><?php echo sprintf( __( 'In the <a href="%1$s" target="_blank">Appearance & Widgets</a> menu, you can add social widgets to the <strong>Social</strong> bar.', 'ominis' ), admin_url('widgets.php') ); ?></p>
		<h3><?php _e('Credits','ominis')?></h3>
		<p><?php echo sprintf( __( 'In the menu <a href="%1$s" target="_blank">Appearance > Customize: Footer</a>, you can change the text that appears in the credits area of ​​the footer.', 'ominis' ), admin_url('customize.php?autofocus[section]=footer') ); ?></p>
		<h3><?php _e('Cookies policy','ominis');?></h3>
		<p><?php echo sprintf( __( 'In the menu <a href="%1$s" target="_blank">Appearance > Customize: Footer</a>, select the page that will contain the website\'s cookie policy information.', 'ominis' ), admin_url('customize.php?autofocus[section]=footer') ); ?></p>
	</div>
<?php	
}
