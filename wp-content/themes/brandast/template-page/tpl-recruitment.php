<?php
/**
 * Template Name: Recruitment  Page
 */
get_header();

// Get post recruitment
$args = array(
    'posts_per_page' => 3,
    'order' => 'DESC',
    'post_type' => 'recruitment',
    'post_status' => 'publish',
);
$post_recruitment = new WP_query($args);
?>

<div id="recruitment-page" class="tpl-page">
    <h1 class="page-title"><?php echo the_title(); ?></h1>
    <!-- Group 1 -->
    <section id="group-1" 
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="sub-title-group-1">
            <h3><?php the_field('sub_title_gr_1'); ?></h3>
        </div>
        <div class="title-group-1">
            <h2><?php the_field('title_gr_1'); ?></h2>
        </div>
                    <?php
                        $banner_type = get_field('banner_select_gr_1');
                        $banner_video = get_field('video_gr_1');
                        $banner_slider = get_field('banner_gr_1');
                        if ($banner_type == 'video_gr_1' && $banner_video != ''): ?>
                                <div class="video-group-1">
                                    <!-- <div class="overlay-video"></div>
                                    <div class="sound-btn on"></div> -->
                                    <video src="<?php the_field('video_gr_1') ?>"
                                           id="video-recruitment" type="video/mp4" autoplay playsinline controls loop></video>
                                </div>
                    <?php
                        elseif ($banner_type == 'banner_gr_1' && $banner_slider != ''):?>
                            <div class="image-group-1">
                                <img src="<?php the_field('banner_gr_1')?>" alt="">
                            </div>
                    <?php endif; ?>
    </section>

    <!-- Group 2 -->
    <section id="group-2" 
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
         <div class="row">
             <div class="col-lg-6 col-md-12">
                 <div class="title-group-2">
                    <h2><?php the_field('title_gr_2'); ?></h2>
                </div>
             </div>
             <div class="col-lg-6 col-md-12"></div>
         </div>
        <div class="row">
            <?php
                if (have_rows('list_benifit_gr_2')):
                    $k = 1;
                    while (have_rows('list_benifit_gr_2')) : the_row(); 
                    ?>
                    <div class="col-lg-6">
                        <div class="list-benifit">   
                            <span class="title">
                                <h3>
                                    <span class="number">
                                        <?php echo '0' . $k . ' - '; ?>
                                    </span>
                                    <?php the_sub_field('title_list_benifit_gr_2'); ?>
                                </h3>
                            </span>
                            <span class="detail">
                                <ul>
                                    <?php
                                        if (have_rows('list_detail_benifit_gr_2')):
                                            while (have_rows('list_detail_benifit_gr_2')) : the_row(); ?>
                                                <li>
                                                    <?php the_sub_field('detail_benifit_gr_2'); ?>
                                                </li>
                                            <?php
                                        endwhile;
                                    else :endif;
                                    ?>
                                </ul>
                            </span>
                        </div>
                    </div>
                        <?php
                        $k++;
                    endwhile;
                else :endif;
            ?>
        </div>
    </section>

    <!-- Group 3 -->
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
                                <img src="<?php the_sub_field('image_album_gr_3')?>" alt="">
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

        </div>

    </section>
    
    <!-- Group 4 -->
    <section id="group-4" 
             class="section-layout wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                 <div class="title-group-4">
                    <h2><?php the_field('title_gr_4') ?></h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12"></div>
        </div>
        <div class="list-post-recruitment">
                                    <?php 
                                        $k = 1;
                                        if (have_rows('list_recruitment_gr_4')):
                                            while (have_rows('list_recruitment_gr_4')) : the_row(); 
                                                    
                                                $posts = get_sub_field('post');
                                                setup_postdata($post);
                                                ?>
                                                
                                                    <?php foreach ($posts as $post):?>
                                                    <?php setup_postdata($post); ?>                                                    
                                                        <div class="box">
                                                            <div class="box-image">
                                                                <?php
                                                                    if (has_post_thumbnail()):
                                                                        the_post_thumbnail('large');
                                                                    else:?>
                                                                        <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                                                             alt="">
                                                                <?php endif; ?>
                                                            </div>
                                                    
                                                            <div class="box-content">
                                                                <div class="date-post">
                                                                    <?php echo get_the_date('d-m-Y'); ?>
                                                                </div>
                                                                <div class="title-post">
                                                                    <a href="<?php the_permalink(); ?>" title="<?php the_sub_field('title_list_recruitment_gr_4'); ?>">
                                                                        <?php the_sub_field('title_list_recruitment_gr_4'); ?>
                                                                    </a>
                                                                </div>
                                                                <div class="description-post">
                                                                    <?php the_sub_field('detai_list_recruitment_gr_4'); ?>
                                                                </div>
                                                                <div class="read-detail">
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <?php _e('[:en]Read more [:vi]Xem thêm')?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                                
                                            <?php $k++;
                                        endwhile;
                                    else :endif;
                                    ?>
        </div>
     </section>

     <!-- Group 5 -->
     <section id="group-5" 
              class="wow fadeInUp"
              data-wow-duration="1s"
              data-wow-delay="0.5s"
              data-wow-offset="100">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="title-group-5">
                    <h2><?php the_field('title_gr_5'); ?></h2>
                </div>
                <div class="margin-contact-button">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <a href="#" id="button-contact-special">
                                        <i class="fa fa-paper-plane"></i>
                                        <?php _e('[:en]Get advice now [:vi]Gửi hồ sơ') ?>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6 col-md-12">
            </div>
        </div>
     </section>
</div>

<?php
get_footer();
?>

