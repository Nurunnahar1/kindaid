<?php
if (!defined('ABSPATH'))
    exit;

class Kindaid_Blog_Recent_Post extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'kindaid_blog_recent_post',
            __('Kindaid Blog Recent Thumb Post', 'kindaid'),
            array('description' => __('Display recent blog posts with thumbnails.', 'kindaid'))
        );
    }

    // FRONT-END DISPLAY
    public function widget($widget_args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $posts_per_page = !empty($instance['posts_per_page']) ? intval($instance['posts_per_page']) : 5;

        echo $widget_args['before_widget'];

        if (!empty($title)) {
            echo $widget_args['before_title'] . esc_html($title) . $widget_args['after_title'];
        }

        // WP Query Arguments
        $query_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => 'date',
            'order' => $order,
        );

        $query = new WP_Query($query_args);
        ?>

        <?php if ($query->have_posts()): ?>
            <?php while ($query->have_posts()):
                $query->the_post(); ?>

                <div class="tp-widget-post-list mb-15">

                    <div class="tp-widget-post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail');
                            } else {
                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/no-image.jpg') . '" alt="">';
                            }
                            ?>
                        </a>
                    </div>

                    <div class="tp-widget-post-content">
                        <span>
                            <i class="far fa-clock"></i>
                            <?php echo esc_html(get_the_date()); ?>
                        </span>

                        <h4 class="tp-widget-post-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo esc_html(get_the_title()); ?>
                            </a>
                        </h4>
                    </div>

                </div>

            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php else: ?>
            <p><?php _e('No posts found.', 'kindaid'); ?></p>
        <?php endif; ?>

        <?php
        echo $widget_args['after_widget'];
    }

    // BACK-END FORM
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $posts_per_page = !empty($instance['posts_per_page']) ? $instance['posts_per_page'] : 5;
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Widget Title:', 'kindaid'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

        <!-- Order ASC/DESC -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')); ?>">
                <?php _e('Post Order:', 'kindaid'); ?>
            </label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('order')); ?>"
                name="<?php echo esc_attr($this->get_field_name('order')); ?>">

                <option value="DESC" <?php selected($order, 'DESC'); ?>>DESC (Latest First)</option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>>ASC (Oldest First)</option>
            </select>
        </p>

        <!-- Posts Per Page -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts_per_page')); ?>">
                <?php _e('Posts Per Page:', 'kindaid'); ?>
            </label>
            <input class="widefat" type="number" min="1" id="<?php echo esc_attr($this->get_field_id('posts_per_page')); ?>"
                name="<?php echo esc_attr($this->get_field_name('posts_per_page')); ?>"
                value="<?php echo esc_attr($posts_per_page); ?>">
        </p>

        <?php
    }

    // SAVE DATA
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['order'] = (!empty($new_instance['order'])) ? sanitize_text_field($new_instance['order']) : 'DESC';
        $instance['posts_per_page'] = (!empty($new_instance['posts_per_page'])) ? intval($new_instance['posts_per_page']) : 5;

        return $instance;
    }
}

// REGISTER THE WIDGET
function register_kindaid_blog_post_recent()
{
    register_widget('Kindaid_Blog_Recent_Post');
}
add_action('widgets_init', 'register_kindaid_blog_post_recent');
