<?php
/**
 * Template Name: Step Page
 */
get_header(); ?>
    <section id="step-page" class="tpl-page">
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
                                                    <?php the_sub_field('title_gr_1') ?>
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
        </section>

        <!-- GROUP 2 -->
        <section id="group-2" 
                 class="section-layout wow fadeInUp" 
                 data-wow-duration="1s" 
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="list-step">
                <?php
                    if (have_rows('list_step_gr_2')):
                        $k = 1;
                        while (have_rows('list_step_gr_2')) : the_row(); 
                        ?>
                            <div class="box">
                                <div class="box-image">
                                    <img src="<?php the_sub_field('image_list_step_gr_2') ?>" alt="">
                                </div>
                                <div class="box-content">
                                    <div class="box-content-main">
                                        <div class="title-step">
                                            <h3><?php _e('[:en]Step [:vi]Bước ') ?> <?php echo $k; ?></h3>
                                        </div>
                                        <div class="title-detail">
                                            <h2><?php the_sub_field('title_list_step_gr_2') ?></h2>
                                        </div>
                                        <div class="content-detail">
                                            <?php the_sub_field('detail_list_step_gr_2') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        <?php
                            $k++;
                        endwhile;
                    else :endif;
                ?>
            </div>
        </section>

        <!-- GROUP 3 -->
        <section id="common-contact-div" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="100">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h2><?php the_field('title_gr_3') ?></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="subtitle">
                        <p><?php the_field('content_gr_3') ?></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="margin-contact-button">
                                <div class="row-xGrid-yMiddle">
                                    <div class="row-xGrid iso-standard">
                                        <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                            <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_3') ?>" id="button-contact-special">
                                                <i class="fa fa-envelope-o"></i>
                                                <?php the_field('button_name_gr_3') ?>
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

