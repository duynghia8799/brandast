<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php setPostViews(get_the_ID()); ?>
    <div class="entry-content">
        <div class="category-title">
            <a href="/project">Project/</a>
            <?php
            global $post;
            $sectors = wp_get_post_terms($post->ID, 'project_sector');
            foreach ($sectors as $sector) {
                $link = get_category_link($sector->term_id);
                echo '<a href="' . $link . '" title="' . $sector->name . '">' . $sector->name . '</a>';
            }
            ?>
        </div>

        <section class="post_banner">
            <div class="post_banner_overlay"
                 style="background-color: <?php the_field('banner_background_color') ?>"></div>
            <div class="post_banner_pic">
                <?php
                $banner_pic = get_field('banner_image_singleproject');
                $nothumb = home_url() . '/wp-content/themes/brandast/dist/images/thumbnail/nothumbnail2.jpg'
                ?>
                <img src="<?= $banner_pic ? $banner_pic : $nothumb; ?>" alt="">

                <div class="post_banner_content">
                    <h1>
                        <?php
                        $content_type = get_field('banner_content_singleproject');
                        $content_text = get_field('title_banner_singleproject');
                        $content_image = get_field('image_banner_singleproject');
                        if ($content_type == 'title_banner_singleproject' && $content_text != ''):
                            echo $content_text;
                        elseif ($content_type == 'image_banner_singleproject' && $content_image != ''):?>
                            <img src="<?= $content_image ?>" alt="<?php the_title('') ?>">
                        <?php else: the_title(); endif; ?>
                    </h1>
                </div>
            </div>
        </section>
        <div class="post_scope">
            <ul>
                <?php $scopes = wp_get_post_terms($post->ID, 'project_scope');
                foreach ($scopes as $scope) {
                    $link = get_category_link($scope->term_id);
                    echo '<li><a href="' . $link . '" title="' . $scope->name . '">' . $scope->name . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <section class="post_content">
            <?php
            if (have_rows('content_group_single_project')):
                while (have_rows('content_group_single_project')) : the_row();
                    if (get_row_layout() == 'layer_content_static'): ?>
                        <div class="layer_content_static">
                            <div class="col-left">
                                <div class="col-left-content">
                                    <?php if (get_sub_field('title_static')): ?>
                                        <h3><?php the_sub_field('title_static') ?></h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-right">
                                <div class="col-right-content">
                                    <?php the_sub_field('content_static') ?>
                                </div>
                            </div>
                        </div>

                    <?php elseif (get_row_layout() == 'layer_content_custom'): ?>
                        <div class="layer_content_custom">
                            <?php 
                                        if (have_rows('content_custom')):
                                            while (have_rows('content_custom')) : the_row(); 
                                                ?>
                                                <img src="<?php the_sub_field('image_project'); ?>" alt=""> 
                                            <?php
                                        endwhile;
                                    else :endif;
                                    ?>
                        </div>
                    <?php
                    endif;

                endwhile;

            else :
            endif;

            ?>

        </section>
        <div class="post_sub">
            <div class="box_tag box_item">
                <div class="title">
                    <?php _e('[:en]Post Tag:[:vi]Th&#7867;:') ?>
                </div>
                <div class="content">
                    <ul>
                        <?php
                        $tags = wp_get_post_terms($post->ID, 'project_tag');
                        if ($tags) {
                            foreach ($tags as $tag) {
                                echo '<li>' . $tag->name . '</li>';
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>
            <div class="box_share box_item">
                <div class="title">
                    <?php _e('[:en]Share on:[:vi]Chia s&#7867;:') ?></div>
                <div class="content">
                    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                    <ul>
                        <li>
                            <a href="http://www.facebook.com/sharer.php?u=<?= $actual_link ?>" target="_blank">
                                Fb.
                            </a>
                        </li>
                        <li>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $actual_link ?>"
                               target="_blank">
                                In.
                            </a>
                        </li>

                        <li>
                            <a href="https://twitter.com/share?url=<?= $actual_link ?>&amp;" target="_blank">
                                Tw.
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/share?url=<?= $actual_link ?>" target="_blank">
                                Gg.
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="post_navigation">
            <?php
            if (qtranxf_getLanguage() == 'en') : ?>
                <div class="nav_item nav_prev">
                    <?php previous_post_link($format = '%link', $link = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;<span class="arrow">Previous article</span>&nbsp;/<span class="link">%title</span>') ?>
                </div>
                <div class="nav_item nav_next">
                    <?php next_post_link($format = '%link', $link = '<span class="link">%title</span>&nbsp; / &nbsp;<span class="arrow"> Next article</span>&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> ') ?>
                </div>

            <?php else: ?>
                <div class="nav_item nav_prev">
                    <?php previous_post_link($format = '%link', $link = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;<span class="arrow">D&#7921; án tr&#432;&#7899;c</span>&nbsp;/<span class="link">%title</span>') ?>
                </div>
                <div class="nav_item nav_next">
                    <?php next_post_link($format = '%link', $link = '<span class="link">%title</span>&nbsp; / &nbsp;<span class="arrow">D&#7921; án sau</span>&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> ') ?>
                </div>

            <?php endif; ?>
        </div>


        <!--        <div class="post_author">-->
        <!--			--><?php //if ( ! is_singular( 'attachment' ) ) : ?>
        <!--				--><?php //get_template_part( 'template-parts/post/author', 'brandast' ); ?>
        <!--			--><?php //endif; ?>
        <!---->
        <!--        </div>-->
        <div class="post_related">
            <h3><?php _e('[:en]Related Articles:[:vi]D&#7921; án liên quan:') ?></h3>
            <div class="list_item">
                <div class="row">
                    <?php
                    $categories = wp_get_object_terms($post->ID,
                        'project_scope',
                        array('fields' => 'ids'));

                    $args = array(
                        'post_type' => 'project',
                        'post_status' => 'publish',
                        'posts_per_page' => 2,
                        'orderby' => 'rand',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'project_scope',
                                'field' => 'id',
                                'terms' => $categories
                            )
                        ),
                        'post__not_in' => array($post->ID),
                    );

                    $relatedPosts = new WP_Query($args);

                    if ($relatedPosts->have_posts()) {
                        while ($relatedPosts->have_posts()) {
                            $relatedPosts->the_post();
                            ?>
                            <div class="col-sm-6 col-12">
                                <div class="item">

                                    <a href="<?php the_permalink(); ?>" class="item__pic">
                                        <?php
                                        $post_thumbnail = get_the_post_thumbnail();
                                        if ($post_thumbnail) {
                                            the_post_thumbnail('large');
                                        } else {
                                            echo "<img src='" . home_url() . "/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png' >";
                                        }
                                        ?>

                                    </a>
                                    <div class="item__content">
                                        <a href="<?php the_permalink(); ?>" class="item__content__title"
                                           title="<?php the_title_attribute(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                        <div class="item__content__sector">
                                            <?php
                                            $sectorchilds = wp_get_post_terms($post->ID, 'project_sector');
                                            foreach ($sectorchilds as $sectorchild) {
                                                $link = get_category_link($sectorchild->term_id);
                                                echo '<a href="' . $link . '">' . $sectorchild->name . '</a>';
                                            } ?>


                                        </div>
                                        <div class="item__content__scope">
                                            <ul>
                                                <?php
                                                $scopechilds = wp_get_post_terms($post->ID, 'project_scope');
                                                $k = 1;
                                                foreach ($scopechilds as $scopechild) {
                                                    if ($k++ > 4) break;
                                                    $link = get_category_link($scopechild->term_id);
                                                    echo '<li><a href="' . $link . '">' . $scopechild->name . '</a></li>';
                                                } ?>
                                            </ul>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <?php
                        }

                    }
                    ?>
                </div>
            </div>


        </div>

    </div><!-- .entry-content -->


</article>
