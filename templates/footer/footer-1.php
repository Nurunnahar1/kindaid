<?php $footer_bg_image = get_theme_mod('footer_bg_image'); ?>

<footer>

    <!-- tp-footer-area-start -->
    <div class="tp-footer-area bg-position tp-bg-mulberry" data-img-bg="<?php echo esc_url($footer_bg_image); ?>">
        <?php if (is_active_sidebar('footer_1_widget_1') || is_active_sidebar('footer_1_widget_2') || is_active_sidebar('footer_1_widget_3') || is_active_sidebar('footer_1_widget_4')): ?>
            <div class="container container-1424 pt-130">
                <div class="row pb-60">
                    <?php if (is_active_sidebar('footer_1_widget_1')): ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                            <?php dynamic_sidebar('footer_1_widget_1'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer_1_widget2')): ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <?php dynamic_sidebar('footer_1_widget_2'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer_1_widget_3')): ?>
                        <div class="col-xxl-3 col-xl-2 col-lg-6 col-md-6 col-sm-6">
                            <?php dynamic_sidebar('footer_1_widget_3'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer_1_widget_4')): ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                            <?php dynamic_sidebar('footer_1_widget_4'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="tp-footer-bottom">
            <div class="container container-1424">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tp-footer-copyright mb-20">
                            <?php kindaid_footer_copyright(); ?>
                            <!-- <p class="mb-0">© 2025 Charity. is Proudly Powered by <a href="#">Aqlova</a></p> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-footer-policy mb-20 text-lg-end">
                            <?php kindaid_footer_menu(); ?>
                            <!-- <a class="dvdr" href="#">Terms & Condition</a>
                            <a href="#">Privacy Policy</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-footer-area-end -->

</footer>