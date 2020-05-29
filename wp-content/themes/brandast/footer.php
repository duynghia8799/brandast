<footer>
    <div id="footer">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-logo">
                            <a href="<?php echo home_url(); ?>" class="logo-footer">
                                <img src="<?php the_field('logo_footer', 'option') ?>" alt="">
                            </a>

                            <a href="<?php echo home_url(); ?>" class="logo-footer logo-footer-nightmode">
                                <img src="<?php the_field('logo_footer_nightmode', 'option') ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <?php
                            if (have_rows('group_footer', 'option')):
                                while (have_rows('group_footer_1', 'option')) : the_row(); ?>
                                        <div class="footer-item">
                                            <div class="item__title"><?php the_sub_field('title_group_footer_1') ?></div>
                                            <div class="item__content">
                                                <?php the_sub_field('content_group_footer_1') ?>
                                            </div>
                                        </div>
                                <?php
                                endwhile;
                            else :endif;

                        ?>
                        <div id="license">
                            © 2019 Copyright by Brandast Agency
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-contact-footer">
                    <?php if (qtranxf_getLanguage() == 'en') {
                        echo do_shortcode('[contact-form-7 id="976" title="Form Footer En"]');
                        } elseif (qtranxf_getLanguage() == 'vi') {
                        echo do_shortcode('[contact-form-7 id="975" title="Form Footer Vi"]');
                    } ?>
                </div>
                        <?php
                            if (have_rows('group_footer_2', 'option')):
                                while (have_rows('group_footer_2', 'option')) : the_row(); ?>
                                        <div class="footer-item">
                                            <div class="item__title"><?php the_sub_field('title_group_footer_2') ?></div>
                                            <div class="item__content">
                                                <?php the_sub_field('content_group_footer_2') ?>
                                            </div>
                                        </div>
                                <?php
                                endwhile;
                            else :endif;

                        ?>
                <div id="license-copy">
                    © 2019 Copyright by Brandast Agency
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->

</div><!--End Wraper Master-->
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '<?php echo home_url(); ?>/thank-you';
    }, false );
</script>
<?php wp_footer(); ?>   

<!-- Menu metu -->
<!-- <script>window.MBID=483;</script><script src="https://menu.metu.vn/static/js/sdk.js?container=body"></script>    -->

</body>
</html>