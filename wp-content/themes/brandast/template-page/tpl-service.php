<?php
/**
 * Template Name: Service Page
 */
get_header(); ?>
<div id="service-page" class="tpl-page">
    <h1 class="page-title"><?php echo the_title(); ?></h1>
    <div id="media-page-service"
             class="wow fadeInUp section-layout"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="row">
            <?php
            $option_type = get_field('option_media_service_gr');
            $type_image = get_field('image_service_gr');
            // var_dump($type_video);die();
            $type_video = get_field('video_service_gr');
            if ($option_type == 'video_service_gr' && $type_video != ''): ?>
                <div id="first_video_of_page">
                    <div class="overlay-video"></div>
                    <div class="sound-btn on"></div>
                    <video src="<?php the_field('video_service_gr') ?>"
                           id="media_video" type="video/mp4" autoplay playsinline controls loop>
                    </video>
                </div>
            <?php
                elseif ($option_type == 'image_service_gr' && $type_image != ''):?>
                <div class="image-page-service">
                    <img src="<?php the_field('image_service_gr')?>" alt="">
                </div>
            <?php endif; ?>
        </div>
    </div>
    <section id="group-1"
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="group-1-left">
                    <div class="subtitle">
                        <?php the_field('subtitle_gr_1') ?>
                    </div>
                    <div class="list-title-group-1 swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            if (have_rows('slider_gr_1')):
                                while (have_rows('slider_gr_1')) : the_row(); ?>
                                    <a href="<?= home_url(); ?>/project" class="title swiper-slide"
                                       title=" <?php the_sub_field('title_slider_gr_1') ?>">
                                        <?php the_sub_field('title_slider_gr_1') ?>
                                    </a>
                                <?php
                                endwhile;
                            else :endif;
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="group-1-right">
                    <div class="group-1-right-content">
                        <?php the_field('content_gr_1') ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (have_rows('list_service_gr_2')):
        $n = 2;
        $m = 1;
        while (have_rows('list_service_gr_2')) : the_row();
            ?>
            <section id="group-<?php echo $n ?>"
                     class="section-layout wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s">
                <div class="box">
                    <div class="box-image">
                        <img src="<?php the_sub_field('image_service_gr_2') ?>" alt="">
                    </div>
                    <div class="box-content">
                        <div class="box-content-main">
                            <span class="number"><?php echo '0' . $m ?></span>

                            <?php

                            $posts = get_sub_field('content_service_gr_2');
                            if ($posts):
                                $postsID = $posts[0]->ID;
                                $taxonomies=get_taxonomies('','names');
                                $taxsname =   wp_get_object_terms( $postsID, 'service_group', array( 'fields' => 'names' ) );
                                echo  '<h3>'.$taxsname[0].'</h3>';
                                ?>
                                <ul>

                                    <?php foreach ($posts as $post):?>


                                        <?php setup_postdata($post); ?>

                                        <li>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>


                            <a href="<?= home_url(); ?>/project"
                               class="readmore">  <?php _e('[:en]Discover [:vi]Xem thêm') ?></a>
                        </div>

                    </div>
                </div>
            </section>
            <?php
            $n++;
            $m++;
        endwhile;
    else :endif;
    ?>
    <section id="group-new" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="100">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="title">
                    <?php the_field('title_group_3')?>
                </div>
                <div id="button-no-redirect-contact">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_3') ?>" id="button-contact-special">
                                        <i class="fa fa-paper-plane"></i>
                                        <?php the_field('button_name_gr_3') ?>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <section id="common-contact-div" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="100">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2><?php the_field('title_gr_4') ?></h2>
                </div>
            </div>
            <div class="col-12">
                <div class="subtitle">
                    <p><?php the_field('content_gr_4') ?></p>
                </div>
            </div>
            <div class="col-12">
                <div class="margin-contact-button">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_4') ?>" id="button-contact-special">
                                        <i class="fa fa-envelope-o"></i>
                                    <?php the_field('button_name_gr_4') ?>
                                    </a>
                                </button>
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
            <li>
                <a href="#group-5"></a>
            </li>
        </ul>
    </nav>
</div>

<?php
get_footer();
?>

