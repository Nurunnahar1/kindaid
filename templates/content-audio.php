<?php
$post_format_audio = function_exists('tpmeta_field') ? tpmeta_field('post_format_audio') : '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("tp-postbox-item mb-30"); ?>>
    <?php if (!empty($post_format_audio)): ?>
        <div class="tp-postbox-thumb  ratio ratio-16x9">
            <?php echo wp_oembed_get($post_format_audio); ?>
        </div>
    <?php endif; ?>


    <div class="tp-postbox-content  mb-30">
        <?php echo get_template_part('templates/blog/blog-meta'); ?>
        <h2 class="tp-postbox-title mb-15"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php the_excerpt(); ?></p>
        <?php echo get_template_part('templates/blog/blog-btn'); ?>
    </div>
</article>