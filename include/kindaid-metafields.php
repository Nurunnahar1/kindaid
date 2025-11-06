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
                'label' => esc_html__('Header Select', 'kindaid'),
                'id' => "header_from_page",
                'type' => 'select',
                'options' => array( 
                    'blank_header' => esc_html__('select Header', 'kindaid'),
                    'header_page_1' => esc_html__('Header one', 'kindaid'),
                    'header_page_2' => esc_html__('Header two', 'kindaid'),
                    'header_page_3' => esc_html__('Header three', 'kindaid'),
                ),
                'placeholder' => esc_html__('Select Header', 'kindaid'),
                'conditional'=>array(),
                'default' => '',
                'multiple' => false,
            )
        ),
    );

    return $meta_boxes;
}
add_filter('tp_meta_boxes', 'kindaid_metafields');

?>