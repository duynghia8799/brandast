<?php
/**
 * Template Name: About  Page
 */
get_header();?>
<div id="about-page" class="tpl-page">
    <h1 class="page-title"><?php echo the_title(); ?></h1>
    <div class="image-group-1 wow fadeInUp"
         data-wow-duration="1s"
         data-wow-delay="0.5s"
         data-wow-offset="100">
        <div class="row">>
        <?php
            $option_type = get_field('option_media_gr1');
            $type_video = get_field('video_gr_1');
            $type_image = get_field('image_gr_1');
            if ($option_type == 'video_gr_1' && $type_video != ''): ?>
            <!-- <div class="group-1-right-video"> -->
                <div id="first_video_of_page">
                    <div class="overlay-video"></div>
                    <div class="sound-btn on"></div>
                    <video src="<?php the_field('video_gr_1') ?>"
                           id="media_video" type="video/mp4" autoplay playsinline controls loop>
                    </video>
                </div>
            <!-- </div> -->
        <?php
            elseif ($option_type == 'image_gr_1' && $type_image != ''):?>
                <div class="image-banner-about">
                    <img src="<?php the_field('image_gr_1')?>" alt="">
                </div>
        <?php endif; ?>
    </div>
    <div class="tab-content-landing-page wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <ul>
            <?php
                while (have_rows('option_menu_about')) : the_row(); ?>    
                    <li>
                        <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a>
                    </li>
            <?php
                endwhile;
            ?>
        </ul>
    </div>
    <section id="group-1"
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="cb"></div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="group-1-left">
                    <div class="subtitle">
                        <?php the_field('subtitle_gr_1')?>
                    </div>
                    <div class="list-title-group-1 swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                                if (have_rows('slider_title_gr_1')):
                                    while (have_rows('slider_title_gr_1')): the_row();?>
                                            <a href="#" class="title swiper-slide"
                                               title=" <?php the_sub_field('title_slider_gr_1')?>">
                                                <?php the_sub_field('title_slider_gr_1')?>
                                            </a>
                                        <?php
                                    endwhile;
                                else:endif;
                                ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="group-1-right">
                    <div class="group-1-right-content">
                        <?php the_field('content_gr_1')?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="group-3"
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="album-gr-3">
            <?php
                if (have_rows('album_gr_3')):
                    $k = 1;
                    while (have_rows('album_gr_3')): the_row();?>
                            <div class="item-<?php echo $k; ?> item">
                                <div class="image-project-about">
                                    <img src="<?php the_sub_field('image_album_gr_3')?>" alt="">
                                </div>
                            </div>
                            <?php
                        $k++;
                    endwhile;
                else:endif;
                ?>
            <div class="item-slider item-slider-1">
                <div class="item-slider-content swiper-container">
                    <ul class="swiper-wrapper">
                        <?php
                            if (have_rows('list_title_1_gr_3')):
                                while (have_rows('list_title_1_gr_3')): the_row();?>
                                    <li class="title swiper-slide">
                                        <span>
                                            <?php the_sub_field('title_list_title_1_gr_3')?>
                                        </span>
                                    </li>
                        <?php
                                endwhile;
                            else:endif;
                        ?>

                    </ul>
                </div>

            </div>

            <div class="item-slider item-slider-2">
                <div class="item-slider-content swiper-container">
                    <ul class="swiper-wrapper">
                        <?php
                            if (have_rows('list_title_2_gr_3')):
                                 while (have_rows('list_title_2_gr_3')): the_row();?>
                                        <li class="title swiper-slide">
                                        <span>
                                            <?php the_sub_field('title_list_title_2_gr_3')?>
                                        </span>
                                        </li>
                                    <?php
                                endwhile;
                            else:endif;
                            ?>
                    </ul>
                </div>
            </div>

            <div class="item-slider item-slider-3">
                <div class="item-slider-content swiper-container">
                    <ul class="swiper-wrapper">
                        <?php
                            if (have_rows('list_title_3_gr_3')):
                                while (have_rows('list_title_3_gr_3')): the_row();?>
                                        <li class="title swiper-slide">
                                        <span>
                                             <?php the_sub_field('title_list_title_3_gr_3')?>
                                        </span>
                                        </li>
                                    <?php
                                endwhile;
                            else:endif;
                            ?>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    
    <section id="group-4">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="section__title wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                        <?php the_field('title_gr_4');?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="content-gr-4 wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                        <?php the_field('content_gr_4');?>
                    <a href="<?=home_url();?>/cac-buoc-sang-tao" class="readmore">
                        <?php _e('[:en]Read more [:vi]Xem thêm')?>
                    </a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="image-gr-4 wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                    <img src="<?php the_field('image_gr_4')?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Vì sao chọn brandast -->
    <section id="why-choose-brandast"
                 class="wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="section__title">
                <h2><?php the_field('title_gr_5', 'option') ?></h2>
            </div>
            <div class="container-item">
                <div class="image">
                    <?php if (qtranxf_getLanguage() == 'en') { ?>
                        <img src="<?php the_field('background_gr_en', 'option') ?>" alt="">
                    <?php } elseif (qtranxf_getLanguage() == 'vi') { ?>
                        <img src="<?php the_field('background_gr_vi', 'option') ?>" alt="">
                    <?php } ?>

                </div>
                <div id="button-no-redirect-contact">
					<div class="row-xGrid-yMiddle">
						<div class="row-xGrid iso-standard">
							<button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
								<a  href="<?php the_field('button_link_profile') ?>"
                                    target="_blank"
                                    id="we-profile">
                                    <i class="fa fa-envelope-o"></i>
                                    <?php the_field('button_name_profile') ?>
								</a>
							</button>
						</div>
					</div>
                </div>
            </div>
    </section>

    <section id="group-5"
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="cb"></div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="section__title wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                        <h2><?php the_field('title_gr_5');?></h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="content-gr-5 wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                    <div class="content">
                        <p><?php the_field('content_gr_5');?></p>
                    </div>
                    <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_5') ?>" class="readmore">
                        <?php the_field('button_name_gr_5') ?>
                    </a>
                </div>
            </div>
        </div>
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
    <nav id="navigation-toc">
        <ul>
            <li class="active">
                <a href="#group-1"></a>
            </li>
            <li>
                <a href="#group-4"></a>
            </li>
            <li>
                <a href="#group-2"></a>
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

