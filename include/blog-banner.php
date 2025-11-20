<?php
if (!defined('ABSPATH')) exit;

class Kindaid_Blog_Banner_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'kindaid_blog_banner_widget',
            __('Kindaid Blog Banner', 'kindaid'),
            ['description' => __('Display blog banner with background, subtitle, title and button.', 'kindaid')]
        );

        add_action('admin_enqueue_scripts', [$this, 'media_uploader']);
    }

    public function media_uploader()
    {
        wp_enqueue_media();
    }

    /* FRONT-END */
    public function widget($args, $instance)
    {
        $bg_image    = !empty($instance['bg_image']) ? $instance['bg_image'] : '';
        $subtitle    = !empty($instance['subtitle']) ? $instance['subtitle'] : '';
        $title       = !empty($instance['title']) ? $instance['title'] : '';
        $button_text = !empty($instance['button_text']) ? $instance['button_text'] : '';
        $button_url  = !empty($instance['button_url']) ? $instance['button_url'] : '';

        echo $args['before_widget'];
        ?>

        <div class="tp-widget-support bg-position mb-20" data-img-bg="<?php echo esc_url($bg_image); ?>">
            <div class="tp-widget-sidebar">
                
                <?php if ($subtitle): ?>
                    <span class="tp-section-subtitle mb-15 d-inline-block" data-color="#ffcf4e">
                        <?php echo esc_html($subtitle); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="tp-widget-support-title">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

            </div>

            <?php if (!empty($button_url)): ?>
                <a class="tp-btn tp-btn-secondary-white text-capitalize tp-btn-animetion w-100 justify-content-center"
                   href="<?php echo esc_url($button_url); ?>">

                    <span class="btn-icon">
                        <!-- Default SVG -->
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.15195 0.500138C6.71895 0.517281 7.26794 0.6157 7.79984 0.79554H7.85294C7.88894 0.812539 7.91594 0.831328 7.93394 0.848328C8.13283 0.911853 8.32093 0.983431 8.50093 1.08185L8.84293 1.23395C8.97793 1.30553 9.13992 1.43884 9.22992 1.49342C9.31992 1.54621 9.41892 1.60079 9.49992 1.66253C10.4998 0.902906 11.7139 0.491334 12.9649 0.500138C13.5328 0.500138 14.0998 0.579912 14.6389 0.759751C17.9607 1.83342 19.1577 5.45704 18.1578 8.62436C17.5908 10.2429 16.6638 11.7201 15.4498 12.9271C13.7119 14.6002 11.8048 16.0854 9.75192 17.3649L9.52692 17.5L9.29292 17.3559C7.23284 16.0854 5.31496 14.6002 3.56088 12.9181C2.3549 11.7111 1.42701 10.2429 0.851011 8.62436C-0.165978 5.45704 1.03101 1.83342 4.38887 0.740961C4.64987 0.651489 4.91897 0.588859 5.18897 0.553965H5.29696C5.54986 0.517281 5.80096 0.500138 6.05296 0.500138H6.15195Z"
                                  fill="currentColor"/>
                        </svg>
                    </span>

                    <span class="btn-text">
                        <?php echo esc_html($button_text ?: 'Learn More'); ?>
                    </span>

                </a>
            <?php endif; ?>

        </div>

        <?php
        echo $args['after_widget'];
    }

    /* BACK-END FORM */
    public function form($instance)
    {
        $bg_image    = $instance['bg_image'] ?? '';
        $subtitle    = $instance['subtitle'] ?? '';
        $title       = $instance['title'] ?? '';
        $button_text = $instance['button_text'] ?? '';
        $button_url  = $instance['button_url'] ?? '';
        ?>

        <p>
            <label><strong>Background Image</strong></label><br>
            <input class="widefat bg-image-upload" type="text"
                   name="<?php echo $this->get_field_name('bg_image'); ?>"
                   value="<?php echo esc_attr($bg_image); ?>">
            <button class="button select-bg">Upload</button>
        </p>

        <p>
            <label><strong>Subtitle</strong></label>
            <input class="widefat" type="text"
                   name="<?php echo $this->get_field_name('subtitle'); ?>"
                   value="<?php echo esc_attr($subtitle); ?>">
        </p>

        <p>
            <label><strong>Title</strong></label>
            <textarea class="widefat" rows="3"
                      name="<?php echo $this->get_field_name('title'); ?>"><?php echo esc_textarea($title); ?></textarea>
        </p>

        <p>
            <label><strong>Button Text</strong></label>
            <input class="widefat" type="text"
                   name="<?php echo $this->get_field_name('button_text'); ?>"
                   value="<?php echo esc_attr($button_text); ?>">
        </p>

        <p>
            <label><strong>Button URL</strong></label>
            <input class="widefat" type="text"
                   name="<?php echo $this->get_field_name('button_url'); ?>"
                   value="<?php echo esc_attr($button_url); ?>">
        </p>

        <script>
            jQuery(function ($) {
                $('.select-bg').on('click', function (e) {
                    e.preventDefault();
                    let input = $(this).prev('.bg-image-upload');

                    let uploader = wp.media({
                        title: 'Choose Image',
                        button: {text: 'Select'},
                        multiple: false
                    }).on('select', function () {
                        let file = uploader.state().get('selection').first().toJSON();
                        input.val(file.url);
                    }).open();
                });
            });
        </script>

        <?php
    }

    public function update($new, $old)
    {
        return [
            'bg_image'    => esc_url_raw($new['bg_image']),
            'subtitle'    => sanitize_text_field($new['subtitle']),
            'title'       => wp_kses_post($new['title']),
            'button_text' => sanitize_text_field($new['button_text']),
            'button_url'  => esc_url_raw($new['button_url']),
        ];
    }
}

/* REGISTER WIDGET */
function register_kindaid_blog_banner_widget()
{
    register_widget('Kindaid_Blog_Banner_Widget');
}
add_action('widgets_init', 'register_kindaid_blog_banner_widget');
