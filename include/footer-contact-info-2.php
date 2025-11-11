<?php
if (!defined('ABSPATH'))
    exit;

class Kindaid_Footer_Contact_Info_2 extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'kindaid_footer_contact_info_2',
            __('Kindaid Footer Contact Info 02', 'kindaid'),
            array('description' => __('Display footer address, phone, email with title and background image.', 'kindaid'))
        );

        add_action('admin_enqueue_scripts', array($this, 'enqueue_media_uploader'));
    }

    // Enqueue media uploader
    public function enqueue_media_uploader($hook)
    {
        if ('widgets.php' !== $hook)
            return;
        wp_enqueue_media();
        wp_enqueue_script('kindaid-footer-widget', get_template_directory_uri() . '/assets/js/footer-widget.js', array('jquery'), null, true);
    }

    // FRONT-END DISPLAY
    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        $address_url = !empty($instance['address_url']) ? $instance['address_url'] : '';

        // If no custom URL, fallback to Google Maps
        if (empty($address_url) && !empty($address)) {
            $address_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
        }

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        ?>

        <div class="tp-footer-3-cta">
            <?php if ($address): ?>
                <h3 class="tp-footer-cta-title mb-30">
                    <a class="common-underline" href="<?php echo esc_url($address_url); ?>" target="_blank">
                        <?php echo kindaid_kses($address); ?>
                    </a>
                </h3>
            <?php endif; ?>

            <?php if ($phone): ?>
                <a class="tp-footer-cta-link mb-5" href="tel:<?php echo esc_attr($phone); ?>">
                    <span><!-- Phone SVG --></span>
                    <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>

            <?php if ($email): ?>
                <a class="tp-footer-cta-link" href="mailto:<?php echo esc_attr($email); ?>">
                    <span><!-- Email SVG --></span>
                    <?php echo esc_html($email); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php
        echo $args['after_widget'];
    }

    // BACK-END FORM
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $address_url = !empty($instance['address_url']) ? $instance['address_url'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kindaid'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'kindaid'); ?></label>
            <textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('address'); ?>"
                name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_textarea($address); ?></textarea>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('address_url'); ?>"><?php _e('Address URL (Optional):', 'kindaid'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_url'); ?>"
                name="<?php echo $this->get_field_name('address_url'); ?>" type="text"
                value="<?php echo esc_attr($address_url); ?>">
            <small>If left empty, Google Maps URL will be used automatically.</small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'kindaid'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>"
                name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'kindaid'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>"
                name="<?php echo $this->get_field_name('email'); ?>" type="email" value="<?php echo esc_attr($email); ?>">
        </p>
        <?php
    }

    // SAVE DATA
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['address'] = (!empty($new_instance['address'])) ? wp_kses_post($new_instance['address']) : '';
        $instance['address_url'] = (!empty($new_instance['address_url'])) ? esc_url_raw($new_instance['address_url']) : '';
        $instance['phone'] = (!empty($new_instance['phone'])) ? sanitize_text_field($new_instance['phone']) : '';
        $instance['email'] = (!empty($new_instance['email'])) ? sanitize_email($new_instance['email']) : '';
        return $instance;
    }
}

// REGISTER THE WIDGET
function kindaid_register_footer_contact_info_widget_2()
{
    register_widget('Kindaid_Footer_Contact_Info_2');
}
add_action('widgets_init', 'kindaid_register_footer_contact_info_widget_2');
