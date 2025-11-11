<?php
if (!defined('ABSPATH'))
    exit;

class Kindaid_Footer_Contact_Info extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'kindaid_footer_contact_info',
            __('Kindaid Footer Contact Info', 'kindaid'),
            array('description' => __('Display footer address, phone, email, and background image.', 'kindaid'))
        );

        // Enqueue media uploader script
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

    // Front-end display
    public function widget($args, $instance)
    {
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        $map_url = !empty($instance['map_url']) ? $instance['map_url'] : '';
        $bg_img = !empty($instance['bg_img']) ? esc_url($instance['bg_img']) : '';

        echo $args['before_widget'];
        ?>
        <div class="tp-footer-widget tp-footer-cta mb-50 bg-position wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".6s"
            <?php if ($bg_img)
                echo 'data-img-bg="' . esc_url($bg_img) . '"'; ?>>

            <?php if ($address): ?>
                <h3 class="tp-footer-cta-title mb-30">
                    <a class="common-underline" href="<?php echo esc_url($map_url); ?>" target="_blank">
                        <?php echo wp_kses_post(nl2br($address)); ?>
                    </a>
                </h3>
            <?php endif; ?>

            <?php if ($phone): ?>
                <a class="tp-footer-cta-link mb-5" href="tel:<?php echo esc_attr($phone); ?>">
                    <span>
                        <!-- Full Phone SVG -->
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.82532 11.843L7.10033 14.568C6.80032 14.3013 6.50866 14.0263 6.22532 13.743C5.36699 12.8763 4.59199 11.968 3.90033 11.018C3.21699 10.068 2.66699 9.11797 2.26699 8.1763C1.86699 7.2263 1.66699 6.31797 1.66699 5.4513C1.66699 4.88464 1.76699 4.34297 1.96699 3.84297C2.16699 3.33464 2.48366 2.86797 2.92533 2.4513C3.45866 1.9263 4.04199 1.66797 4.65866 1.66797C4.89199 1.66797 5.12532 1.71797 5.33366 1.81797C5.55032 1.91797 5.74199 2.06797 5.89199 2.28464L7.82533 5.00964C7.97532 5.21797 8.08366 5.40964 8.15866 5.59297C8.23366 5.76797 8.27532 5.94297 8.27532 6.1013C8.27532 6.3013 8.21699 6.5013 8.10032 6.69297C7.99199 6.88463 7.83366 7.08464 7.63366 7.28464L7.00032 7.94297C6.90866 8.03464 6.86699 8.14297 6.86699 8.2763C6.86699 8.34297 6.87533 8.4013 6.89199 8.46797C6.91699 8.53464 6.94199 8.58463 6.95866 8.63463C7.10866 8.90964 7.36699 9.26797 7.73366 9.7013C8.10866 10.1346 8.50866 10.5763 8.94199 11.018C9.24199 11.3096 9.53366 11.593 9.82532 11.843Z"
                                fill="#620035" />
                            <path
                                d="M18.3088 15.2752C18.3088 15.5085 18.2672 15.7502 18.1838 15.9835C18.1588 16.0502 18.1338 16.1169 18.1005 16.1835C17.9588 16.4835 17.7755 16.7669 17.5338 17.0335C17.1255 17.4835 16.6755 17.8085 16.1672 18.0169C16.1588 18.0169 16.1505 18.0252 16.1422 18.0252C15.6505 18.2252 15.1172 18.3335 14.5422 18.3335C13.6922 18.3335 12.7838 18.1335 11.8255 17.7252C10.8672 17.3169 9.90882 16.7669 8.95882 16.0752C8.63382 15.8335 8.30882 15.5919 8.00049 15.3335L10.7255 12.6085C10.9588 12.7835 11.1672 12.9169 11.3422 13.0085C11.3838 13.0252 11.4338 13.0502 11.4922 13.0752C11.5588 13.1002 11.6255 13.1085 11.7005 13.1085C11.8422 13.1085 11.9505 13.0585 12.0422 12.9669L12.6755 12.3419C12.8838 12.1335 13.0838 11.9752 13.2755 11.8752C13.4672 11.7585 13.6588 11.7002 13.8672 11.7002C14.0255 11.7002 14.1922 11.7335 14.3755 11.8085C14.5588 11.8835 14.7505 11.9919 14.9588 12.1335L17.7172 14.0919C17.9338 14.2419 18.0838 14.4169 18.1755 14.6252C18.2588 14.8335 18.3088 15.0419 18.3088 15.2752Z"
                                fill="#620035" />
                        </svg>
                    </span>
                    <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>

            <?php if ($email): ?>
                <a class="tp-footer-cta-link" href="mailto:<?php echo esc_attr($email); ?>">
                    <span>
                        <!-- Full Email SVG -->
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.167 17.0837H5.83366C3.33366 17.0837 1.66699 15.8337 1.66699 12.917V7.08366C1.66699 4.16699 3.33366 2.91699 5.83366 2.91699H14.167C16.667 2.91699 18.3337 4.16699 18.3337 7.08366V12.917C18.3337 15.8337 16.667 17.0837 14.167 17.0837Z"
                                fill="#620035" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.655 7.10997C14.8704 7.37968 14.8264 7.77295 14.5567 7.98837L11.9475 10.0723C10.8614 10.937 9.13015 10.937 8.044 10.0723L5.44246 7.98776C5.17309 7.77192 5.1297 7.37858 5.34554 7.10921C5.56138 6.83984 5.95472 6.79644 6.22409 7.01229L8.82327 9.09496C9.45378 9.59627 10.5384 9.59615 11.1687 9.09462L13.7766 7.01168C14.0463 6.79626 14.4395 6.84026 14.655 7.10997Z"
                                fill="#FFCA24" />
                        </svg>
                    </span>
                    <?php echo esc_html($email); ?>
                </a>
            <?php endif; ?>

        </div>

        <?php
        echo $args['after_widget'];
    }

    // Back-end widget form
    public function form($instance)
    {
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        $map_url = !empty($instance['map_url']) ? $instance['map_url'] : '';
        $bg_img = !empty($instance['bg_img']) ? $instance['bg_img'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'kindaid'); ?></label>
            <textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('address'); ?>"
                name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_textarea($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('map_url'); ?>"><?php _e('Google Map URL:', 'kindaid'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('map_url'); ?>"
                name="<?php echo $this->get_field_name('map_url'); ?>" type="text" value="<?php echo esc_attr($map_url); ?>">
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
        <p>
            <label for="<?php echo $this->get_field_id('bg_img'); ?>"><?php _e('Background Image URL:', 'kindaid'); ?></label>
            <input class="widefat kindaid-bg-img" id="<?php echo $this->get_field_id('bg_img'); ?>"
                name="<?php echo $this->get_field_name('bg_img'); ?>" type="text" value="<?php echo esc_attr($bg_img); ?>">
            <button class="button upload-bg-image"><?php _e('Upload', 'kindaid'); ?></button>
        </p>

        <script>
            jQuery(document).ready(function ($) {
                $('.upload-bg-image').click(function (e) {
                    e.preventDefault();
                    var button = $(this);
                    var custom_uploader = wp.media({
                        title: 'Select Background Image',
                        button: { text: 'Use this image' },
                        multiple: false
                    }).on('select', function () {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        button.prev('.kindaid-bg-img').val(attachment.url);
                    }).open();
                });
            });

        </script>
        <?php
    }

    // Sanitize values on save
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['address'] = (!empty($new_instance['address'])) ? sanitize_textarea_field($new_instance['address']) : '';
        $instance['map_url'] = (!empty($new_instance['map_url'])) ? esc_url_raw($new_instance['map_url']) : '';
        $instance['phone'] = (!empty($new_instance['phone'])) ? sanitize_text_field($new_instance['phone']) : '';
        $instance['email'] = (!empty($new_instance['email'])) ? sanitize_email($new_instance['email']) : '';
        $instance['bg_img'] = (!empty($new_instance['bg_img'])) ? esc_url_raw($new_instance['bg_img']) : '';
        return $instance;
    }
}

// Register the widget
function kindaid_register_footer_contact_info_widget()
{
    register_widget('Kindaid_Footer_Contact_Info');
}
add_action('widgets_init', 'kindaid_register_footer_contact_info_widget');
