<?php

// kirki
new \Kirki\Panel(
    'kirki_panel',
    [
        'priority' => 10,
        'title' => esc_html__('Kindaid options', 'kirki'),
        'description' => esc_html__('Kindaid All Options Here.', 'kirki'),
    ]
);

// button
// Header info section
function header_info()
{
    new \Kirki\Section(
        'header_info',
        [
            'title' => esc_html__('Header info', 'kirki'),
            'description' => esc_html__('Header Information Here.', 'kirki'),
            'panel' => 'kirki_panel',
            'priority' => 160,
        ]
    );
    new \Kirki\Field\Select(
        [
            'settings' => 'header_global',
            'label' => esc_html__('Select Your Default Header', 'kirki'),
            'section' => 'header_info',
            'default' => 'header_global_1', 
            'placeholder' => esc_html__('Choose a Header', 'kirki'),
            'choices' => [
                'header_global_1' => esc_html__('Header One', 'kirki'),  
                'header_global_2' => esc_html__('Header Two', 'kirki'),  
                'header_global_3' => esc_html__('Header Three', 'kirki'), 
            ],
        ]
    );
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'header_right_switch',
            'label' => esc_html__('Header Right Info Switch ', 'kirki'),
            'description' => esc_html__('Header Right switch', 'kirki'),
            'section' => 'header_info',
            'default' => 'off',
            'choices' => [
                'on' => esc_html__('Enable', 'kirki'),
                'off' => esc_html__('Disable', 'kirki'),
            ],
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'button_text',
            'label' => esc_html__('Button text', 'kirki'),
            'section' => 'header_info',
            'default' => esc_html__('Donate Now', 'kirki'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'button_url',
            'label' => esc_html__('Button Url', 'kirki'),
            'section' => 'header_info',
            'default' => esc_html__('#', 'kirki'),
            'priority' => 10,
        ]
    );

}
header_info();



// Header Social logo
function header_social_kirki()
{
    new \Kirki\Section(
        'header_social_section',
        [
            'title' => esc_html__('Header Social ', 'kirki'),
            'description' => esc_html__('Header Social Information .', 'kirki'),
            'panel' => 'kirki_panel',
            'priority' => 160,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'fb_url',
            'label' => esc_html__('Facebook Url', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'header_social_section',
            'default' => '#',
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'tw_url',
            'label' => esc_html__('Twitter Url', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'header_social_section',
            'default' => '#',
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'inst_url',
            'label' => esc_html__('Instagram Url', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'header_social_section',
            'default' => '#',
        ]
    );
}
header_social_kirki();


// Header logo
function header_logo_kirki()
{
    new \Kirki\Section(
        'header_logo',
        [
            'title' => esc_html__('Header Logo', 'kirki'),
            'description' => esc_html__('Header Logo Information .', 'kirki'),
            'panel' => 'kirki_panel',
            'priority' => 160,
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings' => 'logo',
            'label' => esc_html__('Main Logo', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'header_logo',
            'default' => get_template_directory_uri() . '/assets/img/logo/logo.png',
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings' => 'transparent_logo',
            'label' => esc_html__('Transparent Logo', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'header_logo',
            'default' => get_template_directory_uri() . '/assets/img/logo/logo-yellow.png',
        ]
    );
}

header_logo_kirki();

// offcanvas section
function header_offcanvas_kirki()
{
    new \Kirki\Section(
        'header_offcanvas',
        [
            'title' => esc_html__('Offcanvas Section', 'kirki'),
            'description' => esc_html__('Offcanvas Information .', 'kirki'),
            'panel' => 'kirki_panel',
            'priority' => 160,
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings' => 'offcanvas_logo',
            'label' => esc_html__('Offcanvas Logo', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'header_offcanvas',
            'default' => get_template_directory_uri() . '/assets/img/logo/logo.png',
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'offcanvas_title',
            'label' => esc_html__('Offcanvas Title', 'kirki'),
            'section' => 'header_offcanvas',
            'default' => esc_html__('Hello There!', 'kirki'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Textarea(
        [
            'settings' => 'offcanvas_desc',
            'label' => esc_html__('Offcanvas Description', 'kirki'),
            'section' => 'header_offcanvas',
            'default' => esc_html__('Lorem ipsum dolor sit amet, consect etur adipiscing elit. ', 'kirki'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Repeater(
        [
            'settings' => 'offcanvas_gallery',
            'label' => esc_html__('Offcanvas Gallery Item', 'kirki'),
            'section' => 'header_offcanvas',
            'priority' => 10,
            'default' => [],
            'fields' => [
                'offcanvas_image' => [
                    'type' => 'image',
                    'label' => esc_html__('Offcanvas Image', 'kirki'),
                    'description' => esc_html__('Offcanvas Image Here', 'kirki'),
                    'default' => '',
                ],
            ],
        ]
    );
    new \Kirki\Field\Repeater(
        [
            'settings' => 'offcanvas_info',
            'label' => esc_html__('Offcanvas Info Item', 'kirki'),
            'section' => 'header_offcanvas',
            'priority' => 10,
            'default' => [],
            'fields' => [
                'offcanvas_info_name' => [
                    'type' => 'text',
                    'label' => esc_html__('Offcanvas Info', 'kirki'),
                    'description' => esc_html__('Offcanvas Info Here', 'kirki'),
                    'default' => '',
                ],
                'offcanvas_info_url' => [
                    'type' => 'text',
                    'label' => esc_html__('Offcanvas Info Url', 'kirki'),
                    'description' => esc_html__('Phone(tel:0123) || Email(mailto:abc@gmail.com)', 'kirki'),
                    'default' => '',
                ],
            ],
        ]
    );
}

header_offcanvas_kirki();


// Header logo
function footer_section_kirki()
{
    new \Kirki\Section(
        'footer_section',
        [
            'title' => esc_html__('Footer Section', 'kirki'),
            'description' => esc_html__('Here Footer setting will place .', 'kirki'),
            'panel' => 'kirki_panel',
            'priority' => 160,
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings' => 'footer_bg_image',
            'label' => esc_html__('Footer BG Image', 'kirki'),
            'description' => esc_html__('The saved value will be the URL.', 'kirki'),
            'section' => 'footer_section', 
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'footr_copyright',
            'label' => esc_html__('Copyright Text', 'kirki'),
            'section' => 'footer_section',
            'default' => esc_html__('© 2025 Charity. is Proudly Powered by Aqlova', 'kirki'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Select(
        [
            'settings' => 'footer_global',
            'label' => esc_html__('Select Your Default Footer', 'kirki'),
            'section' => 'footer_section',
            'default' => 'footer_global_1',
            'placeholder' => esc_html__('Choose a Footer', 'kirki'),
            'choices' => [
                'footer_global_1' => esc_html__('Footer One', 'kirki'),
                'footer_global_2' => esc_html__('Footer Two', 'kirki'), 
            ],
        ]
    );
 
}

footer_section_kirki();
 