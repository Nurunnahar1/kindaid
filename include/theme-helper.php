<?php

function kindaid_header()
{

    $header_from_page = function_exists('tpmeta_field') ? tpmeta_field('header_from_page') : '';
    $header_global = get_theme_mod('header_global', 'header_global_1');


    if ($header_from_page == 'header_page_1') {
        get_template_part('templates/header/header-1');
    } elseif ($header_from_page == 'header_page_2') {
        get_template_part('templates/header/header-2');
    } elseif ($header_from_page == 'header_page_3') {
        get_template_part('templates/header/header-3');
    } else {
        if ($header_global == 'header_global_2') {
            get_template_part('templates/header/header-2');

        } elseif ($header_global == 'header_global_3') {
            get_template_part('templates/header/header-3');

        } else {
            get_template_part('templates/header/header-1');

        }
    }

}


//Header Logo Section
function kindaid_logo()
{
    $kindaid_logo_url = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
    ?>
    <a href="<?php echo home_url(); ?>"><img data-width="108" src="<?php echo esc_url($kindaid_logo_url) ?>"
            alt="<?php echo bloginfo(); ?>"></a>

    <?php
}
//Header Transparent Logo 
function kindaid_transparent_logo()
{
    $kindaid_logo_url = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
    $kindaid_transparent_logo_url = get_theme_mod('transparent_logo', get_template_directory_uri() . '/assets/img/logo/logo-yellow.png');
    ?>

    <a href="<?php echo home_url(); ?>">
        <img class="logo-1" data-width="108" src="<?php echo esc_url($kindaid_logo_url) ?>" alt="<?php echo bloginfo(); ?>">
        <img class="logo-2 d-none" data-width="108" src="<?php echo esc_url($kindaid_transparent_logo_url) ?>"
            alt="<?php echo bloginfo(); ?>">
    </a>



    <?php
}


//Header Offcanvas Logo Section
function kindaid_offcanvas_logo()
{
    $kindaid_logo_url = get_theme_mod('offcanvas_logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
    ?>
    <a href="<?php echo home_url(); ?>"><img data-width="108" src="<?php echo esc_url($kindaid_logo_url); ?>"
            alt="<?php echo esc_attr('logo', 'kindaid'); ?>"></a>


    <?php
}


//menu
function kindaid_main_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => '',
        'menu_class' => '',
        'menu_id' => '',
        'fallback_cb' => 'Kindaid_walker_nav_Menu::fallback',
        'walker' => new Kindaid_walker_nav_Menu,
    ));
}

//Kindaid Footer Menu
function kindaid_footer_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'container' => '',
        'menu_class' => '',
        'menu_id' => '',
        'fallback_cb' => 'Kindaid_walker_nav_Menu::fallback',
        'walker' => new Kindaid_walker_nav_Menu,
    ));
}

//header social
function kindaid_social(): void
{
    $fb_url = get_theme_mod('fb_url', __('#', 'kindaid'));
    $tw_url = get_theme_mod('tw_url', __('#', 'kindaid'));
    $inst_url = get_theme_mod('inst_url', __('#', 'kindaid'));
    ?>
    <?php if (!empty($fb_url)): ?>
        <a href="<?php echo esc_url($fb_url); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 12 18" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1.62839 7.77713C0.911363 7.77713 0.761719 7.91782 0.761719 8.59194V9.81416C0.761719 10.4883 0.911363 10.629 1.62839 10.629H3.36172V15.5179C3.36172 16.192 3.51136 16.3327 4.22839 16.3327H5.96172C6.67874 16.3327 6.82839 16.192 6.82839 15.5179V10.629H8.77466C9.31846 10.629 9.45859 10.5296 9.60798 10.038L9.97941 8.81579C10.2353 7.97368 10.0776 7.77713 9.14609 7.77713H6.82839V5.74009C6.82839 5.29008 7.21641 4.92527 7.69505 4.92527H10.1617C10.8787 4.92527 11.0284 4.78458 11.0284 4.11046V2.48083C11.0284 1.80671 10.8787 1.66602 10.1617 1.66602H7.69505C5.30182 1.66602 3.36172 3.49004 3.36172 5.74009V7.77713H1.62839Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
            </svg>
        </a>
    <?php endif; ?>
    <?php if (!empty($tw_url)): ?>
        <a href="<?php echo esc_url($tw_url); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.28884 0.714844H0.666992L6.14691 7.9153L1.01754 13.9556H3.38746L7.26697 9.38713L10.7118 13.9136H15.3337L9.69453 6.50391L9.70451 6.51669L14.5599 0.798959H12.19L8.58427 5.04503L5.28884 0.714844ZM3.21817 1.97588H4.65702L12.7825 12.6525H11.3436L3.21817 1.97588Z"
                    fill="currentColor"></path>
            </svg>
        </a>
    <?php endif; ?>
    <?php if (!empty($inst_url)): ?>
        <a href="<?php echo esc_url($inst_url); ?>">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1.66602 8.99935C1.66602 5.54238 1.66602 3.8139 2.73996 2.73996C3.8139 1.66602 5.54238 1.66602 8.99935 1.66602C12.4563 1.66602 14.1848 1.66602 15.2587 2.73996C16.3327 3.8139 16.3327 5.54238 16.3327 8.99935C16.3327 12.4563 16.3327 14.1848 15.2587 15.2587C14.1848 16.3327 12.4563 16.3327 8.99935 16.3327C5.54238 16.3327 3.8139 16.3327 2.73996 15.2587C1.66602 14.1848 1.66602 12.4563 1.66602 8.99935Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                <path
                    d="M12.4747 9.00103C12.4747 10.9195 10.9195 12.4747 9.00103 12.4747C7.08256 12.4747 5.52734 10.9195 5.52734 9.00103C5.52734 7.08256 7.08256 5.52734 9.00103 5.52734C10.9195 5.52734 12.4747 7.08256 12.4747 9.00103Z"
                    stroke="currentColor" stroke-width="1.5"></path>
                <path d="M13.251 4.75391L13.242 4.75391" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </a>
    <?php endif; ?>

    <?php
}

//Footer Copyright

//Header Logo Section
function kindaid_footer_copyright()
{
    $footr_copyright = get_theme_mod('footr_copyright', esc_html__('© 2025 Charity. is Proudly Powered by Aqlova', 'kindaid'));
    ?>

    <p class="mb-0"><?php echo kindaid_kses($footr_copyright); ?></p>


    <?php
}

//kindaid footer
function kindaid_footer()
{

    $header_from_page = function_exists('tpmeta_field') ? tpmeta_field('footer_from_page') : '';
    $header_global = get_theme_mod('footer_global', 'footer_global_1');


    if ($header_from_page == 'footer_page_1') {
        get_template_part('templates/footer/footer-1');
    } elseif ($header_from_page == 'footer_page_2') {
        get_template_part('templates/footer/footer-2');

    } else {
        if ($header_global == 'footer_global_2') {
            get_template_part('templates/footer/footer-2');

        } else {
            get_template_part('templates/footer/footer-1');

        }
    }


}




/**
 * Sanitize SVG markup for front-end display.
 *
 * @param  string $svg SVG markup to sanitize.
 * @return string 	  Sanitized markup.
 */
function kindaid_kses($tag = '')
{
    $allowed_html = [

        'a' => [
            'class' => [],
            'href' => [],
            'title' => [],
            'target' => [],
            'rel' => [],
        ],
        'b' => [],
        'blockquote' => [
            'cite' => [],
        ],
        'cite' => [
            'title' => [],
        ],
        'code' => [],
        'del' => [
            'datetime' => [],
            'title' => [],
        ],
        'div' => [
            'class' => [],
            'title' => [],
            'style' => [],
        ],
        'dl' => [],
        'dt' => [],
        'em' => [],
        'h1' => [],
        'h2' => [],
        'h3' => [],
        'h4' => [],
        'h5' => [],
        'h6' => [],
        'i' => [
            'class' => [],
        ],
        'img' => [
            'alt' => [],
            'class' => [],
            'height' => [],
            'src' => [],
            'width' => [],
        ],
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'scrolling' => array(),
            'frameborder' => array(),
            'allow' => array(),
            'src' => array(),
        ),
        'strike' => array(),
        'br' => array(),
        'strong' => array(),
    ];

    return wp_kses($tag, $allowed_html);
}

//kindaid pagination
function kindaid_blog_pagination()
{
    $pages = paginate_links(array(
        'type' => 'array',
        'prev_text' => __('<i class="far fa-arrow-left"></i>', 'kindaid'),
        'next_text' => __('<i class="far fa-arrow-right"></i>', 'kindaid')
    ));
    if ($pages) {
        echo '<ul>';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul>';
    }
}