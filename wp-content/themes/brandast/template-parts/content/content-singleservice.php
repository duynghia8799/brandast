<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php setPostViews(get_the_ID()); ?>
    <div class="entry-content">
        <div class="category-title">
            <a href="/services">services</a>
        </div>
        <!-- SLIDE -->
        <section id="group-1"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-4">
                    <div class="group-1-left">
                        <div class="subtitle">
                            <?php the_field('subtitle_gr_1') ?>
                        </div>
                        <div class="title">
                            <?php the_field('title_gr_1') ?>
                        </div>
                        <div class="content">
                            <?php the_field('content_gr_1') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="group-1-right">
                        <div class="banner-gr-1">
                            <img src="<?php the_field('image_gr_1') ?>" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- TAB OF CONTENT -->
        <div class="tab-content-landing-page">
            <ul>
                <?php
                    while (have_rows('option_menu')) : the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a>
                        </li>
                <?php
                    endwhile;
                ?>
            </ul>
        </div>


        <!-- Công trình đang thi công -->  
        <section id="group-2"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <!-- Title Gr 2 -->
                <div class="col-lg-12 col-md-12 wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                    <div class="title-service">
                        <?php the_field('title_gr_2') ?>
                    </div>
                </div>
                

            </div>
            <div class="row wow fadeInUp content-group-2"
                    data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                    <!-- Image Gr 2 -->
                    <div class="col-lg-6 col-md-12">
                        <div class="group-2-left">
                            <div class="image-service">
                                <img src="<?php the_field('image_gr_2') ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Content Gr 2 -->
                    <div class="col-lg-6 col-md-12  ">
                        <div class="group-2-right">
                            <ul>
                                <?php
                                if (have_rows('group_content_gr_2')):
                                    $k = 1;
                                    while (have_rows('group_content_gr_2')) : the_row(); ?>
                                        <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">

                                            <span class="title">
                                                <span class="number">

                                                    <?php 
                                                    if ($k < 10){
                                                         echo '0' . $k . ' - ';
                                                    }else {
                                                        echo $k . ' - ';
                                                    }

                                                     ?>
                                                        

                                                    </span>

                                                <span class="text">
                                                    <?php the_sub_field('title_group_content_gr_2') ?>
                                                </span>


                                            </span>
                                            <span class="content">
                                                <?php the_sub_field('content_group_content_gr_2') ?>
                                            </span>
                                        </li>

                                        <?php
                                        $k++;
                                    endwhile;

                                else :endif;
                                ?>

                            </ul>

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
            </div>

        </section>
        
        <section id="group-2-duplicate"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <!-- Title Gr 3 -->
                <div class="col-lg-12 col-md-12 wow fadeInUp"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                    <div class="title-service">
                        <?php the_field('title_gr_3') ?>
                    </div>
                </div>
                
            </div>
            <div class="row wow fadeInUp content-group-2"
                     data-wow-duration="1s"
                     data-wow-delay="0.5s"
                     data-wow-offset="100">
                    <!-- Content Gr 3 -->
                    <div class="col-lg-6 col-md-12">
                        <div class="group-2-left-duplicate">
                            <ul>
                                <?php
                                if (have_rows('group_content_gr_3')):
                                    $k = 1;
                                    while (have_rows('group_content_gr_3')) : the_row(); ?>
                                        <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">

                                            <span class="title">
                                                <span class="number">

                                                    <?php 
                                                    if ($k < 10){
                                                         echo '0' . $k . ' - ';
                                                    }else {
                                                        echo $k . ' - ';
                                                    }

                                                     ?>
                                                        

                                                    </span>

                                                <span class="text">
                                                    <?php the_sub_field('title_group_content_gr_3') ?>
                                                </span>


                                            </span>
                                            <span class="content">
                                                <?php the_sub_field('content_group_content_gr_3') ?>
                                            </span>
                                        </li>

                                        <?php
                                        $k++;
                                    endwhile;

                                else :endif;
                                ?>

                            </ul>
                            <!-- <div class="margin-contact-button">
                                <a href="<?= home_url(); ?>/project" id="button-contact-special">
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
                    <!-- Image Gr 3 -->
                    <div class="col-lg-6 col-md-12">
                        <div class="group-2-right-duplicate">
                            <div class="image-service">
                                <img src="<?php the_field('image_gr_3') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section id="group-3"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="title-service">
                <?php the_field('title_gr_criteria') ?>
            </div>
            <div class="list-item">
                <div class="row">

                    <?php
                    if (have_rows('list_criteria')):
                        while (have_rows('list_criteria')) : the_row(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="item">
                                    <div class="item__pic">
                                        <img src="<?php the_sub_field('icon_criteria') ?>" alt="">
                                    </div>
                                    <div class="item__title">
                                        <?php the_sub_field('title_gr_criteria_gr_3') ?>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile;
                    else :
                    endif;
                    ?>
                </div>

            </div>
        </section>
        
        <!-- Process -->
        <section id="group-4"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="group-4-left">
                        <div class="title-service">
                            <?php the_field('title_process') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12  ">
                    <div class="group-4-right">
                        <div class="content">
                            <?php the_field('content_process') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group-4-image">
                <img src="<?php the_field('image_process') ?>" alt="">
            </div>

        </section>
        




        <section id="group-list-project"
                 class="wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="list-project wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
                <?php
                    $project_item = get_field('list_project_of_single_service');
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
            <a href="<?=home_url();?>/project" class="readmore text-right">
                <?php _e('[:en]See All [:vi]Xem tất cả')?>
            </a>
        </section>
        <!-- Why choose brandast -->
        <section id="group-5"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="title-service">
                <?php the_field('title_gr_5', 'option') ?>
            </div>
            <div class="container-item">
                <div class="image">
                    <?php if (qtranxf_getLanguage() == 'en') { ?>
                        <img src="<?php the_field('background_gr_en', 'option') ?>" alt="">
                    <?php } elseif (qtranxf_getLanguage() == 'vi') { ?>
                        <img src="<?php the_field('background_gr_vi', 'option') ?>" alt="">
                    <?php } ?>

                </div>
            </div>

        </section>



        <section id="group-6" 
                 class="wow fadeInUp service-group-layout" 
                 data-wow-duration="1s" 
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title-service">
                        <?php the_field('title_group_qa') ?>
                    </div>
                </div>
            </div>
            <div class="list-qa">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="group-6-right">
                                <?php
                                    $taxonomies = get_object_taxonomies(array(
                                            'post_type' => 'service',
                                            'hide_empty' => false)
                                    );

                                ?>
                                <ul>
                                    <?php
                                        if (have_rows('list_qa_left')):
                                            $k = 1;
                                            while (have_rows('list_qa_left')) : the_row(); 
                                            ?>
                                                <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">

                                                    <span class="title">
                                                        <span class="number"><?php echo '0' . $k . ' - '; ?></span><?php the_sub_field('list_question_left') ?>
                                                    </span>
                                                    <ul class="content">
                                                        <?php the_sub_field('list_answer_left') ?>
                                                    </ul>
                                                </li>
                                                <?php
                                                $k++;
                                            endwhile;

                                        else :endif;
                                    ?>
                                </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="group-6-left">
                                <?php
                                    $taxonomies = get_object_taxonomies(array(
                                            'post_type' => 'service',
                                            'hide_empty' => false)
                                    );

                                ?>
                                <ul>
                                    <?php
                                        if (have_rows('list_qa_right')):
                                            $k = 1;
                                            while (have_rows('list_qa_right')) : the_row(); 
                                            ?>
                                                <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">

                                                    <span class="title">
                                                        <span class="number"><?php echo '0' . $k . ' - '; ?></span><?php the_sub_field('list_question_right') ?>
                                                    </span>
                                                    <ul class="content">
                                                        <?php the_sub_field('list_answer_right') ?>
                                                    </ul>
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
            </div>
        </section>

        <section id="common-contact-div" 
            class="section-layout wow fadeInUp" 
            data-wow-duration="1s" 
            data-wow-delay="0.5s"
            data-wow-offset="100">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h2><?php the_field('title_gr_4')?></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="subtitle">
                        <p><?php the_field('content_gr_4')?></p>
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

        <section id="group-7"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="group-7-left">
                        <div class="title-service">
                            <?php the_field('title_gr_7', 'option') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12  ">
                    <div class="group-7-right">
                        <?php
                        $taxonomies = get_object_taxonomies(array(
                                'post_type' => 'service',
                                'hide_empty' => false)
                        );

                        ?>
                        <ul>
                            <?php
                            $k = 1;
                            foreach ($taxonomies as $taxonomy) :
                                $terms = get_terms($taxonomy);
                                foreach ($terms as $term):
                                    $slug_sv = $term->slug;
                                    $list_service = array(
                                        'showposts' => -1,
                                        'order' => 'ASC',
                                        'orderby' => 'DATE',
                                        'post_type' => 'service',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'service_group',
                                                'field' => 'slug',
                                                'terms' => $slug_sv
                                            )
                                        )
                                    );
                                    $list_service_item = new WP_Query($list_service);
                                    ?>
                                    <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">
                                        <span class="title">
                                            <span class="number">
                                                <?php echo '0' . $k . ' - '; ?>
                                            </span>
                                            <?= $term->name; ?>

                                        </span>
                                        <ul class="content">
                                            <?php while ($list_service_item->have_posts()) : $list_service_item->the_post(); ?>
                                                <li>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </li>


                                            <?php endwhile; ?>
                                        </ul>
                                    </li>
                                    <?php $k++; endforeach; endforeach; ?>

                        </ul>

                        <h4>
                            <!-- <div class="margin-contact-button">
                                <a href="<?= home_url(); ?>/project" id="button-contact-special">
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
                        </h4>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- .entry-content -->


</article>
