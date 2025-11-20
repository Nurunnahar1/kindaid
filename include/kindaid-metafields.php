<?php

function kindaid_metafields($meta_boxes)
{
    $meta_boxes[] = array(
        'metabox_id' => 'kindaid-metafields',
        'title' => esc_html__('Page Options', 'kindaid'),
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'core',
        'fields' => array(
            array(
                'label' => esc_html__('Header Layout', 'kindaid'),
                'id' => "header_from_page",
                'type' => 'select',
                'options' => array(
                    'blank_header' => esc_html__('select Header', 'kindaid'),
                    'header_page_1' => esc_html__('Header one', 'kindaid'),
                    'header_page_2' => esc_html__('Header two', 'kindaid'),
                    'header_page_3' => esc_html__('Header three', 'kindaid'),
                ),
                'placeholder' => esc_html__('Select Header', 'kindaid'),
                'conditional' => array(),
                'default' => '',
                'multiple' => false,
            ),
            array(
                'label' => esc_html__('Footer Layout', 'kindaid'),
                'id' => "footer_from_page",
                'type' => 'select',
                'options' => array(
                    'blank_header' => esc_html__('select Footer', 'kindaid'),
                    'footer_page_1' => esc_html__('Footer one', 'kindaid'),
                    'footer_page_2' => esc_html__('Footer two', 'kindaid'),
                ),
                'placeholder' => esc_html__('Select Footer', 'kindaid'),
                'conditional' => array(),
                'default' => '',
                'multiple' => false,
            ),
        ),
    );

    $meta_boxes[] = array(
        'metabox_id' => 'post_format_video_metafields',
        'title' => esc_html__('Post Video URL', 'kindaid'),
        'post_type' => 'post',
        'context' => 'normal',
        'priority' => 'core',
        'fields' => array(
            array(
                'label' => esc_html__('Video Format', 'kindaid'),
                'id' => "post_format_video",
                'type' => 'text',
                'placeholder' => esc_html__('Video url here', 'kindaid'),
                'default' => '',
                'conditional' => array()
            ),
        ),
        'post_format' => 'video'
    );
    $meta_boxes[] = array(
        'metabox_id' => 'post_format_audio_metafields',
        'title' => esc_html__('Post Audio URL', 'kindaid'),
        'post_type' => 'post',
        'context' => 'normal',
        'priority' => 'core',
        'fields' => array(
            array(
                'label' => esc_html__('Audio Format', 'kindaid'),
                'id' => "post_format_audio",
                'type' => 'text',
                'placeholder' => esc_html__('Audio url here', 'kindaid'),
                'default' => '',
                'conditional' => array()
            ),
        ),
        'post_format' => 'audio'
    );

    $meta_boxes[] = array(
        'metabox_id' => 'post_format_gallery_metafields',
        'title' => esc_html__('Post Gallery Image', 'kindaid'),
        'post_type' => 'post',
        'context' => 'normal',
        'priority' => 'core',
        'fields' => array(
            array(

                'label' => esc_html__('Gallery Format', 'kindaid'),
                'id' => "post_format_gallery",
                'type' => 'gallery',
                'default' => '',
                'conditional' => array(),
            ),
        ),
        'post_format' => 'gallery' // if u want to bind with post formats
    );

    return $meta_boxes;
}
add_filter('tp_meta_boxes', 'kindaid_metafields');

?>