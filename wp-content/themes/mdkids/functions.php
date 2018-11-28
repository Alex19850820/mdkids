<?php
/**
 * mdkids functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mdkids
 */

if ( ! function_exists( 'mdkids_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mdkids_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mdkids, use a find and replace
		 * to change 'mdkids' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mdkids', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'mdkids' ),
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
		add_theme_support( 'custom-background', apply_filters( 'mdkids_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'mdkids_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mdkids_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mdkids_content_width', 640 );
}
add_action( 'after_setup_theme', 'mdkids_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mdkids_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mdkids' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mdkids' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mdkids_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mdkids_scripts() {
	/*
	* Подключаем стили:
	* Аргументы:
	* 1) название стиля (может быть любым)
	* 2) путь к файлу
	*/
		// для локальных стилей
	
	//	wp_enqueue_style( 'horizon-style', get_stylesheet_uri() );
//	wp_enqueue_style( 'mdkids-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'mdkids-photoswipe-css', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css', [] );
	wp_enqueue_style( 'mdkids-photoswipe-default', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css', [] );
	
	wp_enqueue_style( 'mdkids-touch-css', get_template_directory_uri() . '/assets/css/touch-menu-la.css', [] );
	
	wp_enqueue_style( 'mdkids-slick-css', get_template_directory_uri() . '/assets/css/slick.css', [] );
	
	wp_enqueue_style( 'mdkids-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', [] );
	
	wp_enqueue_style( 'mdkids-styles', get_template_directory_uri() . '/assets/css/style.css', [] );
	
	wp_enqueue_style( 'mdkids-mystyles', get_template_directory_uri() . '/assets/css/mystyles.css', [] );
	
	/*
	 * Подключаем скрипты:
	 * Аргументы:
	 * 1) название скрипта (может быть любым)
	 * 2) путь к файлу
	 * 3) после каких скриптов подгружать (лучше указать пустой массив
	 * 4) версия (оставляем пустые кавычки)
	 * 5) подключение в футере (true = да, false = нет)
	 *
	 */
	
//	wp_enqueue_script( 'mdkids-navigation', get_template_directory_uri() . '/js/navigation.js', [], '20151215', true );

//	wp_enqueue_script( 'mdkids-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', [], '20151215', true );
	
	wp_enqueue_script( 'mdkids-js-jq', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', [], '', true );
	
	wp_enqueue_script( 'mdkids-js-photoswipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js', [], '', true );
	
	wp_enqueue_script( 'mdkids-js-photoswipe-default-ui', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js', [], '', true );
	
	wp_enqueue_script( 'mdkids-js-slick', get_template_directory_uri() . '/assets/js/slick.min.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-hammer', get_template_directory_uri() . '/assets/js/hammer.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-touch', get_template_directory_uri() . '/assets/js/touch-menu-la.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-inputmask', get_template_directory_uri() . '/assets/js/jquery.inputmask.bundle.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-phone', get_template_directory_uri() . '/assets/js/phone.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-select2', get_template_directory_uri() . '/assets/js/select2.min.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-phone-ru', get_template_directory_uri() . '/assets/js/phone-ru.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-jq_dot', get_template_directory_uri() . '/assets/js/jquery.dotdotdot.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-script', get_template_directory_uri() . '/assets/js/script.js', [], '', true );
	wp_enqueue_script( 'mdkids-js-myscript', get_template_directory_uri() . '/js/script_form.js', [], '', true );
	
	/*
    * Добавляем возможность отправлять AJAX-запросы к скриптам
    * Аргументы:
    * 1) название скрипта, в котором будем писать ajax
    * 2) название объекта, к которому будем обращаться в файле скрипта
    * 3) элементы объекта, которые нам нужны (путь к обработчику аякса, путь к папке темы)
    */
	
	wp_localize_script( 'mdkids-js-myscript', 'myajax',
		[
			'url' => admin_url( 'admin-ajax.php' ),
			'template' => get_template_directory_uri()
		]
	);
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mdkids_scripts' );

/**
* My custom functions
 */
require get_template_directory() . '/includes/custom-functions.php';
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
add_filter('user_contactmethods', 'my_user_contactmethods');

function my_user_contactmethods($user_contactmethods){
	
	$user_contactmethods['patronymic'] = 'Отчество';
	$user_contactmethods['phone'] = 'Телефон';
	$user_contactmethods['birthday'] = 'День рождения';
	$user_contactmethods['sex'] = 'Пол';
	
	return $user_contactmethods;
}

/**login auth*/
add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login
	function pu_login_failed( $user ) {
	     // check what page the login attempt is coming from
	     $referrer = $_SERVER['HTTP_REFERER'];
	     // check that were not on the default login page
	     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
	          // make sure we don't already have a failed login attempt
	          if ( !strstr($referrer, '?login=failed' )) {
	               // Redirect to the login page and append a querystring of login failed
	          wp_redirect( $referrer . '?login=failed');
	         } else {
	               wp_redirect( $referrer );
	         }
	         exit;
	     }
	}
/**empty login and pass*/
add_action( 'authenticate', 'pu_blank_login');
	function pu_blank_login( $user ){
	     // check what page the login attempt is coming from
	     $referrer = $_SERVER['HTTP_REFERER'];
	     $error = false;
	     if($_POST['log'] == '' || $_POST['pwd'] == '')
	     {
	          $error = true;
	     }
	     // check that were not on the default login page
	     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {
	
	          // make sure we don't already have a failed login attempt
	     if ( !strstr($referrer, '?login=failed') ) {
	          // Redirect to the login page and append a querystring of login failed
	          wp_redirect( $referrer . '?login=failed' );
	          } else {
	          wp_redirect( $referrer );
	          }
	    exit;
	     }
	}
	/**Locale*/
add_filter( 'locale', 'set_my_locale' );
function set_my_locale( $lang ) {
	if ( 'ru' == $_GET['language'] )
		return 'ru_RU';
	else
		return $lang;
}