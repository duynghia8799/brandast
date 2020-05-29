<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="<?= home_url(); ?>/wp-content/themes/brandast/dist/images/favicon.png">
    <title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
    <script src='<?php echo home_url(); ?>/wp-content/themes/brandast/dist/plugins/wow/wow.min.js'></script>
    <script> new WOW().init(); </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145595190-1"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145595190-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MFCQQQF');</script>
<!-- End Google Tag Manager -->

</head>

<body class="<?php echo is_user_logged_in() ? 'logged' : '' ?> ">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFCQQQF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper-master"> <!--Start Wraper Master-->
    <header>
        <div id="header" class="<?= is_user_logged_in() ? 'logged' : '' ?>">
            <div class="header-col-left">
                <?php
                if (is_front_page()): ?>
                    <h1>
                        <a href="<?php echo home_url(); ?>"
                           class="header-logo <?php echo is_user_logged_in() ? 'logged' : '' ?>"
                           style="background-image:url(<?php the_field('logo_header', 'option') ?>) ">
                        </a>

                        <a href="<?php echo home_url(); ?>"
                           class="header-logo <?php echo is_user_logged_in() ? 'logged' : '' ?> header-logo-nightmode"
                           style="background-image:url(<?php the_field('logo_header_nightmode', 'option') ?>)">

                        </a>
                    </h1>

                <?php else : ?>
                    <a href="<?php echo home_url(); ?>"
                       class="header-logo <?php echo is_user_logged_in() ? 'logged' : '' ?> header-logo-nightmode"
                       style="background-image:url(<?php the_field('logo_header_nightmode', 'option') ?>)">
                    </a>
                    <a href="<?php echo home_url(); ?>"
                       class="header-logo <?php echo is_user_logged_in() ? 'logged' : '' ?>"
                       style="background-image:url(<?php the_field('logo_header', 'option') ?>)">
                    </a>
                <?php endif; ?>

            </div>
            <div class="header-col-right">
                <div class="header-submenu">
                    <ul>
                        <li>
                            <a href="<?= home_url(); ?>/dich-vu"><?php _e('[:en]Service [:vi]Dịch vụ') ?></a>
                        </li>
                        <li>
                            <a href="<?= home_url(); ?>/giai-phap"><?php _e('[:en]Solution [:vi]Giải pháp') ?></a>
                        </li>
                        <li>
                            <a href="<?= home_url(); ?>/project"><?php _e('[:en]Work [:vi]Dự án') ?></a>
                        </li>
                        <li>
                            <a href="tel:0942555505"><i class="fa fa-phone"></i> <?php _e('[:en]0942555505 [:vi]0942555505') ?></a>
                        </li>
                        <li>
                            <!-- <a href="#" id="go-to-page-contact"></a> -->
                         <!--    <a href="#" id="go-to-page-contact"><i class="fa fa-envelope-o"></i> <?php _e('[:en]Contact [:vi]Liên hệ ngay') ?></a> -->
                            <div class="row-xGrid-yMiddle">
                                    <div class="row-xGrid iso-standard">
                                        <button id="go-to-page-contact" class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                            <!-- <a href="#" id="button-contact-special"> -->
                                                <i class="fa fa-envelope-o"></i> <?php _e('[:en]Contact [:vi]Liên hệ ngay') ?>
                                            <!-- </a> -->
                                        </button>
                                    </div>
                                </div>
                        </li>
                        <li>
                            <a href="#" class="slc-lang">
                                <?php if (has_nav_menu('langmenu')):
                                    wp_nav_menu(array('theme_location' => 'langmenu', 'container' => ''));
                                endif; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div id="button-mainmenu" class="<?php echo is_user_logged_in() ? 'logged' : '' ?> ">
            <img src="<?php echo home_url(); ?>/wp-content/themes/brandast/dist/images/icon/btn-mainmenu.png"
                 alt="">
        </div>


        <div id="header-mainmenu" class="<?php echo is_user_logged_in() ? 'logged' : '' ?> ">
            <div id="mainmenu-col-left">
                <?php if (has_nav_menu('mainmenu')):
                    wp_nav_menu(array('theme_location' => 'mainmenu', 'container' => ''));
                endif; ?>
            </div>
            <div id="mainmenu-col-right">
                <div id="form-contact-header">
                    <?php if (qtranxf_getLanguage() == 'en') {
                       echo do_shortcode('[contact-form-7 id="23" title="CF Header Menu"]');
                    } elseif (qtranxf_getLanguage() == 'vi') {
                       echo do_shortcode('[contact-form-7 id="841" title="CF Header Menu Vi"]');
                    } ?>
                </div>
            </div>
            <a href="<?php echo home_url(); ?>" class="header-logo">
                <img src="<?php the_field('logo_header_custom', 'option') ?>" alt="Brandast">
            </a>
            <div class="fixed-text">
                Unlimited Creating
            </div>
            <div class="fixed-socialnetwork">
                <ul>
                    <?php
                    if (have_rows('social_network', 'option')):
                        while (have_rows('social_network', 'option')) : the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('link_social_network') ?>"
                                   title="<?php the_sub_field('title_social_network') ?>">
                                    <i class="fa <?php the_sub_field('icon_social_network') ?>"></i>
                                </a>
                            </li>
                        <?php
                        endwhile;
                    else :endif;

                    ?>
                </ul>
            </div>
            <div class="fixed-contact">
                <div class="item">
                    <div class="item__title"><?php _e('[:en]Contact [:vi]Liên hệ') ?></div>
                    <?php
                    if (have_rows('group_footer_1', 'option')):
                        while (have_rows('group_footer_1', 'option')) : the_row(); ?>
                            <div class="item__content">
                                <?php the_sub_field('content_group_footer_1') ?>
                            </div>

                        <?php
                        endwhile;
                    else :endif;

                    ?>
                    <?php
                    if (have_rows('group_footer_2', 'option')):
                        while (have_rows('group_footer_2', 'option')) : the_row(); ?>
                            <div class="item__content">
                                <?php the_sub_field('content_group_footer_2') ?>
                            </div>

                        <?php
                        endwhile;
                    else :endif;
                    ?>
                </div>
            </div>
            <div id="btn-close-mainmenu"></div>
        </div>


        <div id="header-contact" class="<?php echo is_user_logged_in() ? 'logged' : '' ?>">
            <div id="contact-col-left">
                <h3 class="page-title"><?php _e('[:en]Contact us [:vi]Liên hệ') ?></h3>
            </div>
            <div id="contact-col-right">
                <div id="form-contact-header-2">
                    <?php if (qtranxf_getLanguage() == 'en') {
           echo do_shortcode('[contact-form-7 id="23" title="CF Header Menu"]');
          
        } elseif (qtranxf_getLanguage() == 'vi') {
           echo do_shortcode('[contact-form-7 id="841" title="CF Header Menu Vi"]');
        } ?>
                </div>
            </div>
            <a href="<?php echo home_url(); ?>" class="header-logo">
                <img src="<?php the_field('logo_header_custom', 'option') ?>" alt="Brandast">
            </a>
            <div class="fixed-text">
                Unlimited Creating
            </div>
            <div class="fixed-socialnetwork">
                <ul>
                    <?php
                    if (have_rows('social_network', 'option')):
                        while (have_rows('social_network', 'option')) : the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('link_social_network') ?>"
                                   title="<?php the_sub_field('title_social_network') ?>">
                                    <i class="fa <?php the_sub_field('icon_social_network') ?>"></i>
                                </a>
                            </li>
                        <?php
                        endwhile;
                    else :endif;

                    ?>
                </ul>
            </div>
            <div class="fixed-contact">
                <div class="item">
                    <div class="item__title"><?php _e('[:en]Contact [:vi]Liên hệ') ?></div>
                    <?php
                    if (have_rows('group_footer_1', 'option')):
                        while (have_rows('group_footer_1', 'option')) : the_row(); ?>
                            <div class="item__content">
                                <?php the_sub_field('content_group_footer_1') ?>
                            </div>

                        <?php
                        endwhile;
                    else :endif;

                    ?>
                    <?php
                    if (have_rows('group_footer_2', 'option')):
                        while (have_rows('group_footer_2', 'option')) : the_row(); ?>
                            <div class="item__content">
                                <?php the_sub_field('content_group_footer_2') ?>
                            </div>

                        <?php
                        endwhile;
                    else :endif;
                    ?>
                </div>
            </div>
            <div id="btn-close-contact"></div>
        </div>
        <div class="fixed-text">
            Unlimited Creating
        </div>
        <div class="fixed-socialnetwork">
            <ul>
                <?php
                if (have_rows('social_network', 'option')):
                    while (have_rows('social_network', 'option')) : the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('link_social_network') ?>"
                               title="<?php the_sub_field('title_social_network') ?>">
                                <i class="fa <?php the_sub_field('icon_social_network') ?>"></i>
                            </a>
                        </li>
                    <?php
                    endwhile;
                else :endif;

                ?>
            </ul>
        </div>


        <!-- Responsive Menu-->
        <div id="button-mainmenu-responsive" class="<?php echo is_user_logged_in() ? 'logged' : '' ?> ">
            <img src="<?php echo home_url(); ?>/wp-content/themes/brandast/dist/images/icon/btn-mainmenu.png"
                 alt="">
        </div>
        <div id="header-mainmenu-responsive" class="<?php echo is_user_logged_in() ? 'logged' : '' ?>">
            <div id="mainmenu-responsive">
                <?php if (has_nav_menu('responsivemenu')):
                    wp_nav_menu(array('theme_location' => 'responsivemenu', 'container' => ''));
                endif; ?>
            </div>
            
            <a href="<?php echo home_url(); ?>" class="header-logo">
                <img src="<?php the_field('logo_header_custom', 'option') ?>" alt="Brandast">
            </a>
            <div class="responsive-socialnetwork">
                <ul>
                    <?php
                    if (have_rows('social_network', 'option')):
                        while (have_rows('social_network', 'option')) : the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('link_social_network') ?>"
                                   title="<?php the_sub_field('title_social_network') ?>">
                                    <i class="fa <?php the_sub_field('icon_social_network') ?>"></i>
                                </a>
                            </li>
                        <?php
                        endwhile;
                    else :endif;

                    ?>
                </ul>
            </div>
            <div id="btn-close-mainmenu-responsive"></div>
            <div class="language-menu-responsive">
                <?php if (has_nav_menu('langmenu')):
                    wp_nav_menu(array('theme_location' => 'langmenu', 'container' => ''));
                endif; ?>
            </div>
        </div>

        <!--Responsive Contact-->
        <div id="header-contact-responsive" class="<?php echo is_user_logged_in() ? 'logged' : '' ?>">
            <a href="<?php echo home_url(); ?>" class="header-logo">
                <img src="<?php the_field('logo_header_custom', 'option') ?>" alt="Brandast">
            </a>
            <div id="form-contact-header-responsive">
               <?php if (qtranxf_getLanguage() == 'en') {
           echo do_shortcode('[contact-form-7 id="23" title="CF Header Menu"]');
          
        } elseif (qtranxf_getLanguage() == 'vi') {
           echo do_shortcode('[contact-form-7 id="841" title="CF Header Menu Vi"]');
        } ?>
            </div>
            <div class="responsive-socialnetwork">
                <ul>
                    <?php
                    if (have_rows('social_network', 'option')):
                        while (have_rows('social_network', 'option')) : the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('link_social_network') ?>"
                                   title="<?php the_sub_field('title_social_network') ?>">
                                    <i class="fa <?php the_sub_field('icon_social_network') ?>"></i>
                                </a>
                            </li>
                        <?php
                        endwhile;
                    else :endif;

                    ?>
                </ul>
            </div>
            <div class="contact-responsive">
                <div class="item">
                    <div class="item__title">
                        <?php _e('[:en]Contact: [:vi]Liên hệ:') ?>
                    </div>
                    <?php
                    if (have_rows('group_footer_1', 'option')):
                        while (have_rows('group_footer_1', 'option')) : the_row(); ?>
                            <div class="item__content">
                                <?php the_sub_field('content_group_footer_1') ?>
                            </div>

                        <?php
                        endwhile;
                    else :endif;

                    ?>
                    <?php
                    if (have_rows('group_footer_2', 'option')):
                        while (have_rows('group_footer_2', 'option')) : the_row(); ?>
                            <div class="item__content">
                                <?php the_sub_field('content_group_footer_2') ?>
                            </div>

                        <?php
                        endwhile;
                    else :endif;
                    ?>
                </div>
            </div>
            <div id="btn-close-contact-responsive"></div>
        </div>
    </header>

