<?php
/**
 * Template Name: Why Choose Brandast Page
 */
get_header(); ?>
    <section id="reason-choose-brandast">
        <h1 class="page-title"><?php echo the_title(); ?></h1>
        <!-- GROUP 1 -->
        <section id="group-1" 
                 class="section-layout wow fadeInUp" 
                 data-wow-duration="1s" 
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="group-1-top">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="group-1-top-left">
                            <div class="subtitle">
                                <?php the_field('subtitle_gr_1') ?>
                            </div>
                            <div class="list-title-group-1">
                                <div class="swiper-wrapper">
                                            <?php
                                                if (have_rows('list_title_gr_1')):

                                                    while (have_rows('list_title_gr_1')) : the_row(); ?>

                                                        <a href="#" class="title swiper-slide">
                                                            <?php the_sub_field('title_list_title_gr_1') ?>
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
                        <div class="group-1-top-right">
                            <div class="content">
                                <?php the_field('content_gr_1') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group-1-bottom">
                <div class="image-group-1-bottom">
                    <?php if (qtranxf_getLanguage() == 'en') { ?>
                        <img src="<?php the_field('background_gr_en', 'option') ?>" alt="">
                    <?php } elseif (qtranxf_getLanguage() == 'vi') { ?>
                        <img src="<?php the_field('background_gr_vi', 'option') ?>" alt="">
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- GROUP 2 -->
        <section id="group-2" 
                 class="section-layout wow fadeInUp" 
                 data-wow-duration="1s" 
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <!-- <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="group-2-left">
                        <div class="image-group-2-left">
                            <img src="<?php the_field('image_gr_2') ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="group-2-right">
                        <div class="title">
                            <h2><?php the_field('title_gr_2') ?></h2>
                        </div>
                        <div class="list-group-reason">
                            <ul>
                                <?php
                                    if (have_rows('list_reason_gr_2')):
                                        $k = 1;
                                        while (have_rows('list_reason_gr_2')) : the_row(); 
                                        ?>
                                            <li>
                                                <span class="title">
                                                    <span class="number"><?php echo '0' . $k . ' - '; ?></span>
                                                    <h3><?php the_sub_field('title_list_reason_gr_2')?></h3>
                                                </span>
                                                <span class="detail">
                                                    <p>
                                                        <?php the_sub_field('detail_list_reason_gr_2')?>
                                                    </p>
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
            </div> -->
            <div class="box">
                <div class="box-image">
                    <div class="image-group-2">
                        <img src="<?php the_field('image_gr_2') ?>" alt="">
                    </div>
                </div>
                <div class="box-content">
                        <div class="title">
                            <h2><?php the_field('title_gr_2') ?></h2>
                        </div>
                        <div class="list-group-reason">
                            <ul>
                                <?php
                                    if (have_rows('list_reason_gr_2')):
                                        $k = 1;
                                        while (have_rows('list_reason_gr_2')) : the_row(); 
                                        ?>
                                            <li>
                                                <span class="title">
                                                    <span class="number"><?php echo '0' . $k . ' - '; ?></span>
                                                    <h3><?php the_sub_field('title_list_reason_gr_2')?></h3>
                                                </span>
                                                <span class="detail">
                                                    <p>
                                                        <?php the_sub_field('detail_list_reason_gr_2')?>
                                                    </p>
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
        </section>

        <!-- GROUP 3 -->
        <section id="group-3" 
                 class="section-layout wow fadeInUp" 
                 data-wow-duration="1s" 
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <!-- <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="group-3-left">
                        <div class="title">
                            <h2><?php the_field('title_gr_3') ?></h2>
                        </div>
                        <div class="list-group-reason">
                            <ul>
                                <?php
                                    if (have_rows('list_reason_group_3')):
                                        $k = 1;
                                        while (have_rows('list_reason_group_3')) : the_row(); 
                                        ?>
                                            <li>
                                                <span class="title">
                                                    <span class="number"><?php echo '0' . $k . ' - '; ?></span>
                                                    <h3><?php the_sub_field('title_list_reason_gr_3')?></h3>
                                                </span>
                                                <span class="detail">
                                                    <p>
                                                        <?php the_sub_field('detail_list_reason_gr_3')?>
                                                    </p>
                                                </span>
                                            </li>
                                        <?php
                                            $k++;
                                        endwhile;
                                    else :endif;
                                ?>
                            </ul>
                        </div>
                         <div class="margin-contact-button">
                                <div class="row-xGrid-yMiddle">
                                    <div class="row-xGrid iso-standard">
                                        <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                            <a href="#" id="button-contact-special">
                                                <i class="fa fa-envelope-o"></i>
                                                <?php _e('[:en]Contact [:vi]Liên hệ báo giá') ?>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="group-3-right">
                        <div class="image-group-3-right">
                            <img src="<?php the_field('image_gr_3') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="box">
                <div class="box-image">
                    <div class="image-group-3">
                        <img src="<?php the_field('image_gr_3') ?>" alt="">
                    </div>
                </div>
                <div class="box-content">
                    <div class="title">
                        <h2><?php the_field('title_gr_3') ?></h2>
                    </div>
                    <div class="list-group-reason">
                            <ul>
                                <?php
                                    if (have_rows('list_reason_group_3')):
                                        $k = 1;
                                        while (have_rows('list_reason_group_3')) : the_row(); 
                                        ?>
                                            <li>
                                                <span class="title">
                                                    <span class="number"><?php echo '0' . $k . ' - '; ?></span>
                                                    <h3><?php the_sub_field('title_list_reason_gr_3')?></h3>
                                                </span>
                                                <span class="detail">
                                                    <p>
                                                        <?php the_sub_field('detail_list_reason_gr_3')?>
                                                    </p>
                                                </span>
                                            </li>
                                        <?php
                                            $k++;
                                        endwhile;
                                    else :endif;
                                ?>
                            </ul>
                    </div>
                    <div class="margin-contact-button">
                                <div class="row-xGrid-yMiddle">
                                    <div class="row-xGrid iso-standard">
                                        <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                            <a href="#" id="button-contact-special">
                                                <i class="fa fa-envelope-o"></i>
                                                <?php _e('[:en]Contact [:vi]Liên hệ báo giá') ?>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </section>
    </section>  
<?php
get_footer();
?>

