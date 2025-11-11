<?php
class Kindaid_Footer_Info_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'kindaid_footer_info',
            __('Kindaid Footer Info', 'kindaid'),
            ['description' => __('A widget to display footer logo, info text, and social links.', 'kindaid')]
        );

        add_action('admin_enqueue_scripts', [$this, 'enqueue_media']);
    }

    // Enqueue Media Uploader Script
    public function enqueue_media()
    {
        wp_enqueue_media();
        wp_enqueue_script(
            'kindaid-footer-upload',
            get_template_directory_uri() . '/assets/js/kindaid-footer-upload.js',
            ['jquery'],
            false,
            true
        );
    }

    // Front-end display
    public function widget($args, $instance)
    {
        $logo = !empty($instance['logo']) ? esc_url($instance['logo']) : '';
        $footer_info = !empty($instance['footer_info']) ? wp_kses_post($instance['footer_info']) : '';

        $facebook = !empty($instance['facebook']) ? esc_url($instance['facebook']) : '';
        $twitter = !empty($instance['twitter']) ? esc_url($instance['twitter']) : '';
        $instagram = !empty($instance['instagram']) ? esc_url($instance['instagram']) : '';
        $linkedin = !empty($instance['linkedin']) ? esc_url($instance['linkedin']) : '';

        echo $args['before_widget'];

        // Logo
        if ($logo): ?>
            <div class="tp-footer-logo mb-25">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img data-width="108" src="<?php echo esc_url($logo); ?>" alt="">
                </a>
            </div>
        <?php endif;

        // Footer Info
        if ($footer_info): ?>
            <p class="tp-footer-dec mb-30"><?php echo esc_html($footer_info); ?></p>
        <?php endif; ?>

        <div class="tp-footer-social">
            <?php if ($facebook): ?>
                <a href="<?php echo $facebook; ?>" target="_blank" rel="noopener noreferrer"><i
                        class="fa-brands fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if ($twitter): ?>
                <a href="<?php echo $twitter; ?>" target="_blank" rel="noopener noreferrer">
                    <!-- Inline Twitter SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.4.36a9.05 9.05 0 01-2.88 1.1 4.52 4.52 0 00-7.71 4.13A12.85 12.85 0 013 2.15a4.51 4.51 0 001.4 6.03A4.48 4.48 0 012 7.7v.05a4.52 4.52 0 003.63 4.44 4.5 4.5 0 01-2.04.08 4.52 4.52 0 004.21 3.13A9.05 9.05 0 012 19.54a12.8 12.8 0 006.92 2.03c8.3 0 12.84-6.88 12.84-12.85 0-.2 0-.39-.01-.58A9.22 9.22 0 0023 3z" />
                    </svg>
                </a>
            <?php endif; ?>

            <?php if ($instagram): ?>
                <a href="<?php echo $instagram; ?>" target="_blank" rel="noopener noreferrer"><i
                        class="fa-brands fa-instagram"></i></a>
            <?php endif; ?>

            <?php if ($linkedin): ?>
                <a href="<?php echo $linkedin; ?>" target="_blank" rel="noopener noreferrer"><i
                        class="fa-brands fa-linkedin-in"></i></a>
            <?php endif; ?>
        </div>

        <?php
        echo $args['after_widget'];
    }

    // Backend form
    public function form($instance)
    {
        $fields = ['logo' => '', 'footer_info' => '', 'facebook' => '', 'twitter' => '', 'instagram' => '', 'linkedin' => ''];
        $instance = wp_parse_args((array) $instance, $fields);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('logo'); ?>">Logo Upload:</label><br>
            <input type="text" class="widefat logo-url" id="<?php echo $this->get_field_id('logo'); ?>"
                name="<?php echo $this->get_field_name('logo'); ?>" value="<?php echo esc_attr($instance['logo']); ?>">
            <button type="button" class="button upload-logo-button">Upload Image</button>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('footer_info'); ?>">Footer Info:</label>
            <textarea class="widefat" rows="4" id="<?php echo $this->get_field_id('footer_info'); ?>"
                name="<?php echo $this->get_field_name('footer_info'); ?>"><?php echo esc_textarea($instance['footer_info']); ?></textarea>
        </p>

        <p><label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>"
                name="<?php echo $this->get_field_name('facebook'); ?>" type="url"
                value="<?php echo esc_attr($instance['facebook']); ?>">
        </p>

        <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>"
                name="<?php echo $this->get_field_name('twitter'); ?>" type="url"
                value="<?php echo esc_attr($instance['twitter']); ?>">
        </p>

        <p><label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>"
                name="<?php echo $this->get_field_name('instagram'); ?>" type="url"
                value="<?php echo esc_attr($instance['instagram']); ?>">
        </p>

        <p><label for="<?php echo $this->get_field_id('linkedin'); ?>">LinkedIn URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>"
                name="<?php echo $this->get_field_name('linkedin'); ?>" type="url"
                value="<?php echo esc_attr($instance['linkedin']); ?>">
        </p>

        <script>
            (function ($) {
                $(document).ready(function () {
                    $('body').on('click', '.upload-logo-button', function (e) {
                        e.preventDefault();
                        const button = $(this);
                        const input = button.prev('.logo-url');
                        const file_frame = wp.media({ title: 'Select or Upload Logo', button: { text: 'Use this image' }, multiple: false });
                        file_frame.on('select', function () {
                            const attachment = file_frame.state().get('selection').first().toJSON();
                            input.val(attachment.url).trigger('change');
                            file_frame.close();
                            $('.media-modal').remove();
                            $('.media-modal-backdrop').remove();
                        });
                        file_frame.open();
                    });
                });
            })(jQuery);
        </script>

        <?php
    }

    // Save widget
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['logo'] = isset($new_instance['logo']) ? esc_url_raw($new_instance['logo']) : '';
        $instance['footer_info'] = isset($new_instance['footer_info']) ? sanitize_textarea_field($new_instance['footer_info']) : '';
        $instance['facebook'] = isset($new_instance['facebook']) ? esc_url_raw($new_instance['facebook']) : '';
        $instance['twitter'] = isset($new_instance['twitter']) ? esc_url_raw($new_instance['twitter']) : '';
        $instance['instagram'] = isset($new_instance['instagram']) ? esc_url_raw($new_instance['instagram']) : '';
        $instance['linkedin'] = isset($new_instance['linkedin']) ? esc_url_raw($new_instance['linkedin']) : '';
        return $instance;
    }
}

// Register widget
add_action('widgets_init', function () {
    register_widget('Kindaid_Footer_Info_Widget');
});
