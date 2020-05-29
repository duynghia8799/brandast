<?php
$name_archive = post_type_archive_title( '', false );
if($name_archive === 'Service'){
    header('Location:'. home_url().'/services');
}
?>

<?php
get_header();
?>

<div id="tpl-archive">
    <?php
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $term_slug_current = $term->slug;
    $scopes_terms = get_categories(
        array(
            'taxonomy' => 'project_scope',
            'type' => 'project',
            'hide_empty' => false
        )
    );
    $sectors_terms = get_categories(
        array(
            'taxonomy' => 'project_sector',
            'type' => 'project',
            'hide_empty' => false
        )
    );
    $tax_slug_current = $term->taxonomy;
    $count_current_terms = $term->count;
    $count_bonus = 9 - $count_current_terms;
    if (is_tax()) { /*Không là Page Project*/
        $args = array(
            'showposts' => 9,
            'order' => 'DESC',
            'orderby' => 'DATE',
            'post_type' => 'project',
            'tax_query' => array(
                array(
                    'taxonomy' => $tax_slug_current,
                    'field' => 'slug',
                    'terms' => $term_slug_current
                )
            )
        );
        $project_item = new WP_Query($args);
        $maxpageterm = floor($count_current_terms / 9 + 1);
        if ($count_current_terms < 9) {
            $args_check = $args;
            $args_check['fields'] = 'ids';
            $posts = get_posts($args_check);
            $posts_current = implode(' ', $posts);
            $posts_current_id = explode(' ', $posts_current);
            $args_bonus = array(
                'posts_per_page' => $count_bonus,
                'order' => 'DESC',
                'orderby' => 'random',
                'post_type' => 'project',
                'post__not_in' => $posts_current_id,
            );
            $project_item_bonus = new WP_Query($args_bonus);
        } else {
            $project_item_bonus = '';
        }
    } else {/*Array cho Page Project*/
        $args = array(
            'showposts' => 9,
            'order' => 'DESC',
            'orderby' => 'DATE',
            'post_type' => 'project',
        );
        $project_item = new WP_Query($args);
        $allpostproject = array(
            'post_type' => 'project'
        );
        $allpostproject = wp_count_posts('project')->publish;
        $maxpage = floor($allpostproject / 9 + 1);
    }
    ?>

    <h1 class="page-title"><?= is_tax() ? $term->name : _e('[:en]project[:vi]dự án'); ?></h1>

    <section id="group-project-top"
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="row">
            <div class="col-lg-6 col-md-12 ">
                <div class="group-top-left">
                    <div class="subtitle">
                        <?php the_field('subtitle_project', 21) ?>
                    </div>
                    <div class="list-title-project-top swiper-container">
                        <ul class="swiper-wrapper">
                            <?php
                            if (have_rows('list_title_project', 21)):
                                while (have_rows('list_title_project', 21)) : the_row(); ?>
                                    <li class="title swiper-slide">
                                        <span>
                                            <?php the_sub_field('title_project') ?>
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
            <div class="col-lg-6 col-md-12 ">
                <div class="group-top-right">
                    <div class="group-top-right-content">
                        <?php the_field('content_project', 21) ?>
                    </div>

                    <div class="group-top-right-navigation">
                        <div class="project-scope project-term">
                            <a href="#" class="title">
                                <?php _e('[:en]Scope[:vi]Dịch vụ') ?>
                            </a>

                            <ul class="content">
                                <?php
                                if ($scopes_terms):
                                    foreach ($scopes_terms as $scope_term):
                                        $linkscope = get_category_link($scope_term->term_id);
                                        $slugscope = $scope_term->slug;
                                        ?>
                                        <li class="<?= ($slugscope === $term_slug_current) ? 'active' : ''; ?>">
                                            <a href="<?= $linkscope; ?>">
                                                <?= $scope_term->name ?>
                                            </a>
                                        </li>
                                    <?php
                                    endforeach;
                                else:;
                                endif;
                                ?>
                            </ul>
                        </div>
                        <div class="project-sector project-term">
                            <a href="#" class="title">
                                 <?php _e('[:en]Sector[:vi]Lĩnh vực') ?>
                            </a>

                            <ul class="content">
                                <?php
                                if ($sectors_terms):
                                    foreach ($sectors_terms as $sector_term):
                                        $linksector = get_category_link($sector_term->term_id);
                                        $slugsector = $sector_term->slug;
                                        ?>
                                        <li class="<?= ($slugsector === $term_slug_current) ? 'active' : ''; ?>">
                                            <a href="<?= $linksector; ?>"><?= $sector_term->name; ?>

                                            </a>

                                        </li>
                                    <?php
                                    endforeach;
                                else:;
                                endif;
                                ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (is_tax()): ?> <!--/*Template Child Project*/-->
        <input type="hidden" name="maxpage" value="<?= $maxpageterm ?>" id="countpage">
        <input type="hidden" name="termcurrent" value="<?= $term_slug_current ?>" id="termcurrent">
        <input type="hidden" name="taxcurrent" value="<?= $tax_slug_current ?>" id="taxcurrent">

        <section id="group-project-main"
                 class="wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">

            <div class="list-project">
                <?php
                    $k = 1;
                    while ($project_item->have_posts()) : $project_item->the_post(); ?>
                        <div class="grid-item grid-item-<?= $k; ?>">
                            <div href="<?php the_permalink(); ?>" class="item">
                                <a href="<?php the_permalink(); ?>" class="item__overlay"></a>
                                <div class="item__pic">
                                    <?php
                                    if (has_post_thumbnail()):
                                        the_post_thumbnail('large');
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
                        <?php $k++;endwhile; ?>

                    <?php /*Bonus Grid Item*/
                    if ($count_current_terms < 9 && $project_item_bonus->have_posts()) {
                        while ($project_item_bonus->have_posts()) : $project_item_bonus->the_post(); ?>
                            <div class="grid-item grid-item-<?= $k; ?>">
                                <div href="<?php the_permalink(); ?>" class="item">
                                    <a href="<?php the_permalink(); ?>" class="item__overlay"></a>
                                    <div class="item__pic">
                                        <?php
                                        if (has_post_thumbnail()):
                                            the_post_thumbnail('large');
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
                            <?php $k++;endwhile;
                    }

                    wp_reset_query();

                    ?>

            </div>

        </section>
        <?php
        if ($count_current_terms > 9): ?>
            <button class="load-more">
            </button>
        <?php endif; ?>
    <?php else: ?> <!--/*Template Page Project*/-->

        <input type="hidden" name="maxpage" value="<?= $maxpage ?>" id="countpage">
        <section id="group-project-main"
                 class="wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">


            <div class="list-project">
                <?php
                if ($project_item->have_posts()) :
                    $k = 1;
                    while ($project_item->have_posts()) : $project_item->the_post(); ?>
                        <div class="grid-item grid-item-<?= $k; ?>">
                            <div href="<?php the_permalink(); ?>" class="item">
                                <a href="<?php the_permalink(); ?>" class="item__overlay"></a>
                                <div class="item__pic">
                                    <?php
                                    if (has_post_thumbnail()):
                                        the_post_thumbnail('large');
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
                                    $post_id = get_the_ID();
                                    $sectorchilds = wp_get_post_terms($post_id, 'project_sector');

                                    foreach ($sectorchilds as $sectorchild) {

                                        $linksectorchild = get_category_link($sectorchild->term_id);
                                        echo '<a href="' . $linksectorchild . '" class="item__content__sector"> ' . $sectorchild->name . '</a>';
                                    } ?>
                                    <div class="item__content__scope">

                                        <?php
                                        $scopechilds = wp_get_post_terms($post_id, 'project_scope');
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
                        <?php $k++;endwhile;
                    wp_reset_query();

                    endif; ?>
            </div>

        </section>
        <?php
        if ($allpostproject > 9): ?>
            <button class="load-more">
            </button>
        <?php endif; ?>
    <?php endif; ?>
    <section id="together-with-brandast"
             class="wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="section__title">
            <h2><?php the_field('title_gr_new',21)?></h2>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="together-left">
                    <img src="<?php the_field('image_gr_new',21)?>" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="together-right">
                    <div class="subtitle">
                        <h2><?php the_field('subtitle_gr_new',21)?></h2>
                    </div>
                    <div class="content">
                        <p>
                            <?php the_field('content_gr_new',21)?>
                        </p>
                    </div>
                    <div id="button-no-redirect-contact">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <a href="<?=home_url();?>/<?php the_field('button_link',21)?>" id="button-contact-special">
                                        <i class="fa fa-envelope-o"></i>
                                        <?php the_field('button_name',21)?>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <section id="common-contact-div" 
            class="section-layout wow fadeInUp" 
            data-wow-duration="1s" 
            data-wow-delay="0.5s"
            data-wow-offset="100">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h2><?php the_field('common_title_gr', 'option')?></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="subtitle">
                        <p><?php the_field('common_description_gr', 'option')?></p>
                    </div>
                </div>
                <div class="col-12">
                    <!-- <div class="margin-contact-button">
                        <a href="<?=home_url();?>/project" id="button-contact-special">
                            <i class="fa fa-envelope-o"></i>
                            <?php _e('[:en]Contact us [:vi]Liên hệ báo giá')?>
                        </a>
                    </div> -->
                    <div class="margin-contact-button">
                        <div class="row-xGrid-yMiddle">
                            <div class="row-xGrid iso-standard">
                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
                                    <a href="#" id="button-contact-special">
                                        <i class="fa fa-envelope-o"></i>
                                        <?php _e('[:en]Contact us [:vi]Liên hệ báo giá')?>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<?php
if (is_tax()) {
    $check_last_page = $count_current_terms % 9;
} else {
    $check_last_page = $allpostproject % 9;
}

if ($check_last_page <= 3) {
    $row_last_page = 1;
} else if ($check_last_page > 3 && $check_last_page <= 6) {
    $row_last_page = 2;
}
 else {
    $row_last_page = 3;
}
?>
<input type="hidden" name="rowlastpage" value="<?= $row_last_page; ?>">
<?php get_footer(); ?>

<script>
    $(document).ready(function () {
        var num = 2;
        var maxpage = $("input[name='maxpage']").val();
        var taxonomy = $("input[name='taxcurrent']").val();
        var term = $("input[name='termcurrent']").val();
        var offset = 9; // khái báo số lượng bài viết đã hiển thị
        var page = 1;
        var rowlastpage = $("input[name='rowlastpage']").val();
        $('.load-more').click(function (event) {
            page = page + 1;
            if (page >= maxpage) {
                page = 'lasttype-' + rowlastpage
            }
            $.ajax({ // Hàm ajax
                type: "post", //Phương thức truyền post hoặc get
                dataType: "html", //Dạng dữ liệu trả về xml, json, script, or html
                async: true,
                url: '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
                data: {
                    action: "loadmore", //Tên action, dữ liệu gởi lên cho server
                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                    taxonomy: taxonomy, // gởi taxonomy
                    term: term, // gởi term
                    page: page
                },
                beforeSend: function () {
                    // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
                },
                success: function (response) {
                    $('#group-project-main').append(response);
                    offset = offset + 9; // tăng bài viết đã hiển thị
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Làm gì đó khi có lỗi xảy ra
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            });
            num = num + 1;
            if (num > maxpage) {
                num = 'btn-hidden'
            }
            $(this).attr('data-num', num);
            var length = $(".page-last .grid-item").length;
            console.log(length);
        });

    });

</script>
