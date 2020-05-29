<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php setPostViews(get_the_ID()); ?>
    <div class="entry-content">
        <div class="recruitment-title">
            <a href="/recruitment"><?php _e('[:en]Recruitment [:vi]Tuyển dụng')?>/</a><?php echo the_title() ?>
        </div>
    
        <!-- Group 1 -->
        <section id="group-1"
                 class="wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="banner-position-job">
                        <div class="banner-overlay"></div>
                        <img src="<?php the_field('image_banner_gr1') ?>" alt="">
                        <div class="box-group-1">
                            <div class="subtitle-recruitment">
                                <h3><?php _e('[:en]Recruitment [:vi]Tuyển dụng')?></h3>
                            </div>
                            <div class="title-recruitment">
                                <h1><?php the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Group 2 -->
        <section id="group-2"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="group-2-left">
                        <div class="group-2-left-top">
                            <div class="title-description">
                                <h2><?php the_field('title_description_gr') ?></h2>
                            </div>
                            <div class="detail-description">
                                <ul>
                                    <?php
                                        if (have_rows('list_desription_gr')):
                                            while (have_rows('list_desription_gr')) : the_row(); ?>
                                                <li>
                                                    - <?php the_sub_field('detail_description_gr'); ?>
                                                </li>
                                            <?php
                                        endwhile;
                                    else :endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="group-2-left-bottom">
                            <div class="title-requirtment">
                                <h2><?php the_field('title_requirement_gr') ?></h2>
                            </div>
                            <div class="detail-requirtment">
                                <ul>
                                    <?php
                                        if (have_rows('list_requirement_gr')):
                                            while (have_rows('list_requirement_gr')) : the_row(); ?>
                                                <li>
                                                    - <?php the_sub_field('detail_requirement_gr'); ?>
                                                </li>
                                            <?php
                                        endwhile;
                                    else :endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="group-2-right">
                        <div class="infor-job">
                            <div class="title-infor">
                                <h3><?php the_field('title_infor_gr') ?></h3>
                            </div>
                            <ul>
                                <?php
                                    if (have_rows('list_infor_gr')):
                                            while (have_rows('list_infor_gr')) : the_row(); ?>
                                                <li>
                                                    <span class="title">
                                                        <span class="option-infor">
                                                            <?php the_sub_field('option_infor_gr'); ?>:
                                                        </span>
                                                        <span class="detail-infor">
                                                            <?php the_sub_field('detail_infor_gr'); ?>
                                                        </span>
                                                    </span>
                                                </li>
                                            <?php
                                        endwhile;
                                    else :endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Group 3 -->
        <section id="group-3"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="title-group-3">
                <h3><?php the_field('title_benifit_gr_3') ?></h3>
            </div>
            <div class="list-benifit">
                <?php
                    if (have_rows('list_benifit_gr')):
                        $k = 1;
                        while (have_rows('list_benifit_gr')) : the_row(); 
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="image-benifit">
                                    <img src="<?php the_sub_field('image_benifit_gr')?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="detail-benifit">
                                    <span class="title">
                                        <h3>
                                            <span class="number">
                                                <?php echo '0' . $k . ' - '; ?>
                                            </span>
                                            <?php the_sub_field('title_benifit_gr')?>
                                        </h3>
                                    </span>
                                    <span class="detail">
                                        <ul>
                                            <?php
                                                if (have_rows('list_detail_benifit_gr')):
                                                    while (have_rows('list_detail_benifit_gr')) : the_row(); ?>
                                                        <li>
                                                            <?php the_sub_field('detail_benifit_gr'); ?>
                                                        </li>
                                                    <?php
                                                endwhile;
                                            else :endif;
                                            ?>
                                        </ul>
                                    </span>
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

        <!-- Group 4 -->
        <section id="group-4"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="title-group-4">
                <h3><?php the_field('title_gr_form') ?></h3>
            </div>
            <div class="form-page-recruitment">
                <?php if (qtranxf_getLanguage() == 'en') {
                   echo do_shortcode('[contact-form-7 id="1207" title="Form Page Recruitment En"]');
                } elseif (qtranxf_getLanguage() == 'vi') {
                   echo do_shortcode('[contact-form-7 id="1206" title="Form Page Recruitment"]');
                } ?>
            </div>
        </section>
        

        <section id="post_related"
                 class="post_related"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <h3><?php _e('[:en]Other job [:vi]Các vị trí khác')?></h3>
            <div class="list_item">
                <div class="row">
                        <?php 
                            // Get post post_related
                            $custom_taxterms = wp_get_object_terms( $post->ID, 'recruitment');
                            // arguments
                            $args = array(
                                'post_type' => 'recruitment',
                                'post_status' => 'publish',
                                'showposts' => 2,
                                'orderby' => 'rand',
                                'post__not_in' => array($post->ID),
                            );
                            $post_related = new WP_query($args);
                        
                                if ($post_related->have_posts()) :
                                    while ($post_related->have_posts()) : $post_related->the_post(); ?>
                                        <div class="col-sm-6 col-12">
                                            <div class="item">
                                                <a href="#" class="item__pic">
                                                    <?php
                                                        if (has_post_thumbnail()):
                                                            the_post_thumbnail('large');
                                                        else:?>
                                                            <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                                                 alt="">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="item__content">
                                                    <a href="<?php the_permalink(); ?>" class="item__content__title">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_query();
                                endif; ?>
                </div>
            </div>
        </section>
        <!-- Group Related -->
    </div><!-- .entry-content -->
</article>
