<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );

	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;

		// Load Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		// Load Stylesheets
//		wp_enqueue_style( 'html5reset-reset', get_template_directory_uri() . '/reset.css' );
//		wp_enqueue_style( 'html5reset-style', get_stylesheet_uri() );

		// Load IE Stylesheet.
//		wp_enqueue_style( 'html5reset-ie', get_template_directory_uri() . '/css/ie.css', array( 'html5reset-style' ), '20130213' );
//		$wp_styles->add_data( 'html5reset-ie', 'conditional', 'lt IE 9' );

		// Modernizr
		// This is an un-minified, complete version of Modernizr. Before you move to production, you should generate a custom build that only has the detects you need.
		// wp_enqueue_script( 'html5reset-modernizr', get_template_directory_uri() . '/_/js/modernizr-2.6.2.dev.js' );

	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );


	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

//		 Add the site name.
		$title .= get_bloginfo( 'name' );

//		 Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

//		 Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );
//FIX
//		if (function_exists('is_tag') && is_tag()) {
//		   single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
//		elseif (is_archive()) {
//		   wp_title(''); echo ' Archive - '; }
//		elseif (is_search()) {
//		   echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
//		elseif (!(is_404()) && (is_single()) || (is_page())) {
//		   wp_title(''); echo ' - '; }
//		elseif (is_404()) {
//		   echo 'Not Found - '; }
//		if (is_home()) {
//		   bloginfo('name'); echo ' - '; bloginfo('description'); }
//		else {
//		    bloginfo('name'); }
//		if ($paged>1) {
//		   echo ' - page '. $paged; }

		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );




//OLD STUFF BELOW


	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Clean up the <head>, if you so desire.
	//	function removeHeadLinks() {
	//    	remove_action('wp_head', 'rsd_link');
	//    	remove_action('wp_head', 'wlwmanifest_link');
	//    }
	//    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );

    //Register our sidebars and widgetized areas.
    function html5reset_widgets_init() {

    	register_sidebar( array(
    		'name' => 'Sidebar Widgets',
    		'id' => 'sidebar-primary',
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget' => '</aside>',
    		'before_title' => '<h3 class="widget-title">',
    		'after_title' => '</h3>',
    	) );

    	register_sidebar( array(
    		'name' => 'Events Sidebar',
    		'id' => 'sidebar-events',
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget' => '</aside>',
    		'before_title' => '<h3 class="widget-title">',
    		'after_title' => '</h3>',
    	) );

    	register_sidebar( array(
    		'name' => 'Header Description',
    		'id' => 'header-description',
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget' => '</aside>',
    		'before_title' => '<h3 class="widget-title">',
    		'after_title' => '</h3>',
    	) );

    	register_sidebar( array(
    		'name' => 'Homepage Description',
    		'id' => 'homepage-description',
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget' => '</aside>',
    		'before_title' => '<h3 class="widget-title">',
    		'after_title' => '</h3>',
    	) );

    	register_sidebar( array(
    		'name' => 'Events Widget Location',
    		'id' => 'events-widget',
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget' => '</aside>',
    		'before_title' => '<h3 class="widget-title">',
    		'after_title' => '</h3>',
    	) );

    }
    add_action( 'widgets_init', 'html5reset_widgets_init' );

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

    add_theme_support('post-thumbnails');
    add_image_size('fullscreen-background', 1250, 538, true );
    add_image_size('preview-thumbnail', 661, 256);

    function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    include 'photos/photos.php';
    include 'infinite-scroll.php';


    /**
     * Include the TGM_Plugin_Activation class.
     */
    require_once dirname( __FILE__ ) . '/include-plugin/tgm-plugin-activation/class-tgm-plugin-activation.php';

    add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
    /**
     * Register the required plugins for this theme.
     *
     * In this example, we register two plugins - one included with the TGMPA library
     * and one from the .org repo.
     *
     * The variable passed to tgmpa_register_plugins() should be an array of plugin
     * arrays.
     *
     * This function is hooked into tgmpa_init, which is fired within the
     * TGM_Plugin_Activation class constructor.
     */
    function my_theme_register_required_plugins() {

    	/**
    	 * Array of plugin arrays. Required keys are name and slug.
    	 * If the source is NOT from the .org repo, then source is also required.
    	 */
    	$plugins = array(
    		/** This is an example of how to include a plugin pre-packaged with a theme */
    		array(
    			'name'     => 'The Events Calendar', // The plugin name
    			'slug'     => 'the-events-calendar', // The plugin slug (typically the folder name)
    			'source'   => get_stylesheet_directory() . '/lib/plugins/the-events-calendar.3.2.zip', // The plugin source
    			'required' => true,
    		),
    		/** This is an example of how to include a plugin from the WordPress Plugin Repository */
    		array(
    			'name' => 'The Events Calendar',
    			'slug' => 'the-events-calendar',
    		),
    	);

    	/** Change this to your theme text domain, used for internationalising strings */
    	$theme_text_domain = 'tgmpa';

    	/**
    	 * Array of configuration settings. Uncomment and amend each line as needed.
    	 * If you want the default strings to be available under your own theme domain,
    	 * uncomment the strings and domain.
    	 * Some of the strings are added into a sprintf, so see the comments at the
    	 * end of each line for what each argument will be.
    	 */
    	$config = array(
    		/*'domain'       => $theme_text_domain,         // Text domain - likely want to be the same as your theme. */
    		/*'default_path' => '',                         // Default absolute path to pre-packaged plugins */
    		/*'menu'         => 'install-my-theme-plugins', // Menu slug */
    		'strings'      	 => array(
    			'page_title'             => __( 'Install Required Plugins', $theme_text_domain ), //
    			'menu_title'             => __( 'Install Plugins', $theme_text_domain ), //
    			'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name
    			'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL
    			'button'                 => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name
    			'installing'             => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
    			'oops'                   => __( 'Something went wrong with the plugin API.', $theme_text_domain ), //
    			'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL
    			'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name
    			'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL
    			'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name
    			'return'                 => __( 'Return to Required Plugins Installer', $theme_text_domain ), //
    		),
    	);

    	tgmpa( $plugins, $config );

    }


?>
