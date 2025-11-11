<?php
if (!function_exists('kindaid_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */




    function kindaid_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on kindaid, use a find and replace
         * to change 'kindaid' to the name of your theme in all the template files
         */
        load_theme_textdomain('kindaid', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'main-menu' => __('Main Menu', 'kindaid'),
                'footer-menu' => __('Footer Menu', 'kindaid'),
            )
        );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', [
            'image',
            'video',
            'quote',
            'gallery',
            'audio',
            'chat',
        ]);



        remove_theme_support('widgets-block-editor');
    }
endif; // kindaid_setup
add_action('after_setup_theme', 'kindaid_setup');

/**
 * Add a sidebar.
 */
function kindaid_widgets()
{
    // footer style 01
    register_sidebar(array(
        'name' => __('Footer 1 : Widget 1', 'kindaid'),
        'id' => 'footer_1_widget_1',
        'description' => __('Widgets in this area will be shown on footer 1 :wedget 1', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget mb-40 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".3s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1 : Widget 2', 'kindaid'),
        'id' => 'footer_1_widget_2',
        'description' => __('Widgets in this area will be shown on footer 1 :wedget 2', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget ml-75 mb-50 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".4s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1 : Widget 3', 'kindaid'),
        'id' => 'footer_1_widget_3',
        'description' => __('Widgets in this area will be shown on footer 1 :wedget 3', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-2 mb-50 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".5s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1 : Widget 4', 'kindaid'),
        'id' => 'footer_1_widget_4',
        'description' => __('Widgets in this area will be shown on footer 1 :wedget 4', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget   mb-50 bg-position wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".6s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));

    // footer style 02
    register_sidebar(array(
        'name' => __('Footer 2 : Widget 1', 'kindaid'),
        'id' => 'footer_2_widget_1',
        'description' => __('Widgets in this area will be shown on footer 2 :wedget 1', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget mb-40 mr-70 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".3s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2 : Widget 2', 'kindaid'),
        'id' => 'footer_2_widget_2',
        'description' => __('Widgets in this area will be shown on footer 2 :wedget 2', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget ml-30 mb-50 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".4s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2 : Widget 3', 'kindaid'),
        'id' => 'footer_2_widget_3',
        'description' => __('Widgets in this area will be shown on footer 2 :wedget 3', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget ml-75 tp-footer-col-2 mb-50 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".5s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2 : Widget 4', 'kindaid'),
        'id' => 'footer_2_widget_4',
        'description' => __('Widgets in this area will be shown on footer 2 :wedget 4', 'kindaid'),
        'before_widget' => '<div id="%1$s" class="tp-footer-widget ml-30  mb-50 wow fadeInUp %2$s" data-wow-duration=".9s" data-wow-delay=".6s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-title mb-15">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'kindaid_widgets');


//kindaid scripts
function kindaide_scripts()
{
    //css
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        [],
        '5.3.8',
        'all'
    );
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', [], '1.0', 'all');
    wp_enqueue_style(
        'swiper-bundle',
        get_template_directory_uri() . '/assets/css/swiper-bundle.css',
        [],
        '6.5.0',
        'all'
    );
    wp_enqueue_style(
        'magnific-popup',
        get_template_directory_uri() . '/assets/css/magnific-popup.css',
        [],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'font-awesome-pro',
        get_template_directory_uri() . '/assets/css/font-awesome-pro.css',
        [],
        '6.0.0',
        'all'
    );
    wp_enqueue_style('kindaid-spacing', get_template_directory_uri() . '/assets/css/spacing.css', [], '1.0', 'all');
    wp_enqueue_style('kindaid-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0', 'all');
    wp_enqueue_style('style', get_stylesheet_uri());

    //js
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-min.js', ['jquery'], '5.3.8', true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.js', ['jquery'], '6.5.0', true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', ['jquery'], '1.1.0', true);
    wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.js', ['jquery'], '1.0', true);
    wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/js/purecounter.js', ['jquery'], '1.5.0', true);
    wp_enqueue_script(
        'range-slider',
        get_template_directory_uri() . '/assets/js/range-slider.js',
        ['jquery'],
        '1.12.1',
        true
    );
    wp_enqueue_script(
        'parallax',
        get_template_directory_uri() . '/assets/js/parallax.js',
        ['jquery'],
        '1.0',
        true
    );
    wp_enqueue_script(
        'parallax-scroll',
        get_template_directory_uri() . '/assets/js/parallax-scroll.js',
        ['jquery'],
        '1.0',
        true
    );
    wp_enqueue_script(
        'wow',
        get_template_directory_uri() . '/assets/js/wow.min.js',
        ['jquery'],
        '1.0',
        true
    );
    wp_enqueue_script(
        'kindaid-slider-init',
        get_template_directory_uri() . '/assets/js/slider-init.js',
        ['jquery'],
        '1.0',
        true
    );
    wp_enqueue_script('kindaid-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }



    if (!class_exists('Kirki')) {
        return;
    }
}

add_action('wp_enqueue_scripts', 'kindaide_scripts');


//kindaid required files
include_once('include/footer-contact-info.php');
include_once('include/footer-contact-info-2.php');
include_once('include/footer-info.php');
include_once('include/nav-walker.php');
include_once('include/footer-newsletter.php');

if (function_exists('tpmeta_field')) {
    include_once('include/kindaid-metafields.php');
}

include_once('include/theme-helper.php');


function kindaid_kirky()
{
    if (class_exists('Kirki')) {
        include_once('include/kindaid-kirki.php');
    }
}
add_action('init', 'kindaid_kirky');