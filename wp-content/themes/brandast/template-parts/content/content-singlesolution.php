<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php setPostViews(get_the_ID()); ?>
    <div class="entry-content">
        <div class="category-title">
            <a href="<?= home_url(); ?>/solution">Giải pháp</a>
        </div>

        <section id="group-1"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="group-1-left">
                        <div class="content-group-1-left">
                            <div class="subtitle">
                                <h3><?php the_field('title_gr_1') ?></h3>
                            </div>
                            <div class="title">
                                <h2><?php the_title() ?></h2>
                            </div>
                            <div class="content">
                                <?php the_field('description_gr_1') ?>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="group-1-right">
                        <div class="image">
                            <?php
                                if (has_post_thumbnail()):
                                    the_post_thumbnail();
                                else:?>
                                    <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <div class="tab-content-landing-page">
            <ul>
                <?php
                    while (have_rows('option_menu_solution_detail')) : the_row(); ?>    
                        <li>
                            <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a>
                        </li>
                <?php
                    endwhile;
                ?>
            </ul>
        </div>   

        <!-- Group 2 -->
        <section id="group-2"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="title-group-2">
                <h2><?php the_field('title_gr_2') ?></h2>
            </div>
            <div class="list-option-solution">
                <?php
                    if (have_rows('list_detail_gr_2')):
                        
                        while (have_rows('list_detail_gr_2')) : the_row(); 
                        ?>
                            <div class="box">
                                <div class="box-image">
                                    <img src="<?php the_sub_field('image_list_detail_gr_2')?>" alt="">
                                </div>
                                <div class="box-content">
                                    <div class="title-option">
                                        <?php the_sub_field('title_list_detail_gr_2')?>
                                    </div>
                                    <ul>
                                    <?php 
                                        if (have_rows('list_option_gr_2')):
                                            $k = 1;
                                            while (have_rows('list_option_gr_2')) : the_row(); 
                                                ?>
                                                
                                                    <li class="<?php echo ($k == 1) ? 'active' : ''; ?>" data-eq="<?= $k ?>">
                                                        <span class="title">
                                                            <h3>
                                                                <span class="number">
                                                                    <?php echo '0' . $k . ' - '; ?>
                                                                </span>
                                                                <?php the_sub_field('title_list_option_gr_2')?>
                                                            </h3>
                                                        </span>
                                                        <span class="detail">
                                                            <?php the_sub_field('detail_list_option_gr_2')?>
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
                        <?php
                        endwhile;
                    else :endif;
                ?>
            </div>
        </section> 
        <section id="common-contact-div" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="list-button">
                        <ul>
                            <li>
                                <div class="margin-contact-button">
                                    <div class="row-xGrid-yMiddle">
                                        <div class="row-xGrid iso-standard">
                                            <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                                    <?php
                                                    if (have_rows('button_left')):
                                                        while (have_rows('button_left')) : the_row(); ?>
                                                            <a href="<?php the_sub_field('button_link_left') ?>" id="button-contact-special">
                                                                <i class="fa fa-envelope-o"></i>
                                                                <?php the_sub_field('button_name_left') ?>
                                                            </a>
                                                        <?php
                                                        endwhile;
                                                    else :endif;
                                                    ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="button-no-redirect-contact">
                                    <div class="row-xGrid-yMiddle">
                                        <div class="row-xGrid iso-standard">
                                            <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                                <?php
                                                    if (have_rows('button_center')):
                                                        while (have_rows('button_center')) : the_row(); ?>
                                                            <a href="<?php the_sub_field('button_link_center') ?>" id="button-contact-special">
                                                                <i class="fa fa-envelope-o"></i>
                                                                <?php the_sub_field('button_name_center') ?>
                                                            </a>
                                                        <?php
                                                        endwhile;
                                                    else :endif;
                                                ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="button-no-redirect-contact">
                                    <div class="row-xGrid-yMiddle">
                                        <div class="row-xGrid iso-standard">
                                            <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                                <?php
                                                    if (have_rows('button_right')):
                                                        while (have_rows('button_right')) : the_row(); ?>
                                                            <a href="<?php the_sub_field('button_link_right') ?>" id="button-contact-special">
                                                                <i class="fa fa-envelope-o"></i>
                                                                <?php the_sub_field('button_name_right') ?>
                                                            </a>
                                                        <?php
                                                        endwhile;
                                                    else :endif;
                                                ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h2><?php the_field('title_gr_5') ?></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="subtitle">
                        <p><?php the_field('content_gr_5') ?></p>
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
                <h2><?php the_field('title_gr_3') ?></h2>
            </div>
            <div class="image">
                <img src="<?php the_field('image_gr_3') ?>" alt="">
                <!-- <img src="http://brandastnew.com/wp-content/uploads/2019/05/quy-trinh-en.gif" alt=""> -->
            </div>
        </section> 

        <!-- Group 4 -->
        <section id="group-4"
                 class="wow fadeInUp service-group-layout"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="list-project">
                    <?php
                    $project_item = get_field('list_project_gr_4');

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
            <a href="<?= home_url(); ?>/project" class="readmore text-right">
                    <?php _e('[:en]See all [:vi]Xem tất cả') ?>
            </a>
        </section> 

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
            </div>
        </section>
    </div><!-- .entry-content -->
</article>
