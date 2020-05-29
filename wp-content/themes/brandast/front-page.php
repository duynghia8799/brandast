<?php
get_header();
?>

    <section id="homepage">
        <section id="group-1" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="group-1-left">
                        <div class="subtitle">
                            <?php the_field('subtitle_gr_1'); ?>
                        </div>
                        <a href="<?= home_url(); ?>/project" title="<?php the_field('title_gr_1'); ?>"
                           class="title">
                            <?php the_field('title_gr_1'); ?>
                        </a>
                        <a href="<?= home_url(); ?>/project" class="readmore">
                            <?php _e('[:en]Discover [:vi]Xem thêm') ?>
                        </a>
                    </div>
                </div>


                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="group-1-right">

                        <?php
                        $banner_type = get_field('banner_select_gr_1');
                        $banner_video = get_field('video_gr_1');
                        $banner_slider = get_field('slider_gr_1');
                        if ($banner_type == 'video_gr_1' && $banner_video != ''): ?>
                            <div class="group-1-right-video">
                                <div class="video">
                                    <div class="overlay-video"></div>
                                    <div class="sound-btn on"></div>
                                    <video src="<?php the_field('video_gr_1') ?>"
                                           id="video-homepage" type="video/mp4" autoplay playsinline></video>
                                </div>
                            </div>
                        <?php
                        elseif ($banner_type == 'slider_gr_1' && $banner_slider != ''):?>
                            <div class="slider-group-1">
                                <div class="swiper-wrapper">
                                    <?php
                                    if (have_rows('slider_gr_1')):

                                        while (have_rows('slider_gr_1')) : the_row(); ?>

                                            <a href="/project" class="swiper-slide">
                                                <img src=" <?php the_sub_field('image_slider_gr_1') ?>" alt="">
                                            </a>

                                        <?php
                                        endwhile;
                                    else :endif;
                                    ?>
                                </div>
                                <!--  Add Arrows-->
                                <div class="gr1-button gr1-button-prev">
                                    <?php _e('[:en]prev [:vi]trước') ?>
                                </div>
                                <div class="gr1-button gr1-button-next">
                                    <?php _e('[:en]next [:vi]tiếp') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section id="group-2" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="group-2-top">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="group-2-top-left">
                            <div class="subtitle">
                                <?php the_field('subtitle_gr_2') ?>
                            </div>
                            <div class="list-title-group-2">
                                <div class="swiper-wrapper">
                                    <?php
                                    if (have_rows('listtitle_gr_2')):
                                        while (have_rows('listtitle_gr_2')) : the_row(); ?>
                                            <a href="<?= home_url(); ?>/about" class="title swiper-slide"
                                               title=" <?php the_sub_field('title_listtitle_gr_2') ?>">
                                                <?php the_sub_field('title_listtitle_gr_2') ?>
                                            </a>
                                        <?php
                                        endwhile;
                                    else :endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="group-2-top-right">
                            <div class="content">
                                <?php the_field('introduce_gr_2') ?>
                            </div>
                            <a href="<?= home_url(); ?>/about" class="readmore">
                                <?php _e('[:en]About us [:vi]Về chúng tôi') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group-2-bottom">
                <div class="list-project">
                    <?php
                    $project_item = get_field('list_project_gr_2');

                    if ($project_item): ?>
                        <?php $k = 1;
                        foreach ($project_item as $post):; // variable must be called $post (IMPORTANT)
                            ?>
                            <?php setup_postdata($post); ?>
                            <div class="grid-item grid-item-<?= $k; ?>">
                                <div href="<?php the_permalink(); ?>" class="item">
                                    <a href="<?php the_permalink(); ?>" class="item__overlay"></a>
                                    <div class="item__pic">
                                        <?php
                                        if (has_post_thumbnail()):
                                            the_post_thumbnail();
                                        else:?>
                                            <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                                 alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="item__content">
                                        <a href="<?php the_permalink(); ?>" class="item__content__title">
                                            <?php the_title() ?>
                                        </a>
                                        <?php
                                        $sectorchilds = wp_get_post_terms($post->ID, 'project_sector');

                                        foreach ($sectorchilds as $sectorchild) {

                                            $linksectorchild = get_category_link($sectorchild->term_id);
                                            echo '<a href="' . $linksectorchild . '" class="item__content__sector"> ' . $sectorchild->name . '</a>';
                                        } ?>
                                        <div class="item__content__scope">

                                            <?php
                                            $scopechilds = wp_get_post_terms($post->ID, 'project_scope');
                                            $timescopes = 0;
                                            foreach ($scopechilds as $scopechild) {
                                                if ($timescopes++ > 2) break;
                                                $linkscopechild = get_category_link($scopechild->term_id);
                                                echo '<a href="' . $linkscopechild . '">' . $scopechild->name . '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $k++;endforeach; ?>

                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>


                </div>
                <!-- <a href="<?= home_url(); ?>/project" class="readmore pull-right mt-5">
                    <?php _e('[:en]See all [:vi]Xem tất cả') ?>

                </a> -->
            </div>
        </section>
        <section id="group-3" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-md-6">
                    <div class="group-3-left">
                        <div class="subtitle">
                            <?php the_field('subtitle_gr_3'); ?>
                        </div>

                        <ul>
                            <?php
                            if (have_rows('list_faq_3')):
                                $n = 1;
                                while (have_rows('list_faq_3')) : the_row(); ?>
                                    <li class="<?php echo ($n == 1) ? 'active' : ''; ?>" data-active="<?= $n ?>">
                                        <a href="<?php the_field('link_gr_3'); ?>"
                                           title="<?php the_field('title_gr_3'); ?>"
                                           class="title">
                                            <?php the_sub_field('title_list_faq_3') ?>
                                        </a>
                                    </li>

                                    <?php
                                    $n++;
                                endwhile;

                            else :endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="group-3-right">
                        <div class="faq-group-3">
                            <ul>
                                <?php
                                if (have_rows('list_faq_3')):
                                    $k = 1;
                                    while (have_rows('list_faq_3')) : the_row(); 
                                        $posts = get_sub_field('answer_list_faq_3');
                                    ?>
                                        <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">

                                            <span class="question">
                                                <span class="number"><?php echo '0' . $k . ' - '; ?></span><?php the_sub_field('question_list_faq_3') ?>
                                            </span>
                                            <span class="answer">
                                                <?php foreach ($posts as $key => $post) {
                                                    setup_postdata($post); 
                                                ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title();?> 
                                                        <span class="ticket">-</span>
                                                    </a>
                                                <?php } ?>
                                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                            </span>
                                        </li>
                                        <?php
                                        $k++;
                                    endwhile;

                                else :endif;
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="margin-contact-button">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button href="#" class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <i class="fa fa-envelope-o"></i>
                                    <?php _e('[:en]Get advice now [:vi]Nhận tư vấn ngay') ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="group-5" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                        <div class="subtitle">
                            <a href="<?= home_url(); ?>/giai-phap"><?php the_field('subtitle_gr_5') ?></a>
                        </div>
                        <div class="title">
                            <?php the_field('title_gr_5') ?>
                        </div>
                        <div class="list-solution">
                            <div class="row">
                                <?php 
                                    if (have_rows('list_solution_gr5')):
                                        while (have_rows('list_solution_gr5')) : the_row(); 
                                                
                                            $posts = get_sub_field('content_solution_gr5');
                                            ?>
                                            
                                            <div class="col-md-4">
                                                <ul>
                                                <?php foreach ($posts as $post):?>
                                                <?php setup_postdata($post); ?>                                                    
                                                    <li>
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                                </ul>
                                            </div>
                                            
                                        <?php
                                    endwhile;
                                else :endif;
                                ?>
                            </div>
                        </div>
                       <!--  <div class="margin-contact-button">
                            <a href="#" id="button-contact-special">
                                <i class="fa fa-envelope-o"></i>
                                <?php _e('[:en]Get advice now [:vi]Nhận tư vấn ngay') ?>
                            </a>
                        </div> -->
                        <div class="margin-contact-button">
                            <div class="row-xGrid-yMiddle">
                                <div class="row-xGrid iso-standard">
                                    <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                        <a href="#" id="button-contact-special">
                                            <i class="fa fa-envelope-o"></i>
                                            <?php _e('[:en]Get advice now [:vi]Nhận tư vấn ngay') ?>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <section id="group-4" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="group-4-left">
                <div class="title">
                    <?php the_field('title_gr_4') ?>
                </div>
            </div>
            <div class="row">

                <div class="offset-lg-3 col-lg-9 col-md-12">
                    <div class="group-4-right">
                        <div class="slider-group-4">
                            <div class="swiper-wrapper">
                                <?php
                                if (have_rows('list_customer')):
                                    while (have_rows('list_customer')) : the_row(); ?>
                                        <div class="swiper-slide">
                                            <a href="<?php the_sub_field('link_list_customer') ?>">
                                                <img src="<?php the_sub_field('logo_list_customer') ?>" alt="">
                                            </a>
                                        </div>

                                    <?php
                                    endwhile;
                                else :endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <nav id="navigation-toc">
            <ul>
                <li class="active">
                    <a href="#group-1"></a>
                </li>
                <li>
                    <a href="#group-2"></a>
                </li>
                <li>
                    <a href="#group-3"></a>
                </li>
                <li>
                    <a href="#group-4"></a>
                </li>
            </ul>
        </nav>
    </section>
    <section id="common-contact-div" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="100">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2><?php the_field('title_gr_6') ?></h2>
                </div>
            </div>
            <div class="col-12">
                <div class="subtitle">
                    <p><?php the_field('content_gr_6') ?></p>
                </div>
            </div>
            <div class="col-12">
                <div class="margin-contact-button">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_6') ?>" id="button-contact-special">
                                        <i class="fa fa-envelope-o"></i>
                                        <?php the_field('button_name_gr_6') ?>
                                    </a>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();
?>