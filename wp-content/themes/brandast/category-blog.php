<?php
get_header();
?>
<?php
$queried_object = get_queried_object();
$category_slug = $queried_object->slug;
$categories_id = 1;
$big_item = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $category_slug,
    'posts_per_page' => 1,
    'order' => 'DESC',
    'orderby' => 'DATE',
));

$most_view_item = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $category_slug,
    'posts_per_page' => 4,
    'order' => 'DESC',
    'orderby' => 'meta_value_num',
    'meta_key' => 'post_views_count',

));

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$list_item = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $category_slug,
    'posts_per_page' => 6,
    'paged' => $paged,
    'order' => 'DESC',
    'orderby' => 'DATE',
));
?>
<div id="category-page" class="tpl-page">
    <h1 class="page-title">
        <?php echo single_cat_title(); ?>
    </h1>
    <div class="cb"></div>
    <section class="section-header wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">
        <div class="col-left">
            <?php if ($big_item->have_posts()): ?>
            <div class="item">
                <?php
                while ($big_item->have_posts()): $big_item->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="item__pic">
                        <?php
                        if (has_post_thumbnail()):
                            the_post_thumbnail('large');
                        else:?>
                            <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                 alt="">
                        <?php endif; ?>
                    </a>
                    <div class="item__content">
                        <a href="<?php the_permalink(); ?>" class="item__content__title"
                           title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <div class="item__content__date">
                            <i class="fa fa-clock-o"></i> <?php echo get_the_time('G:i') . ' ' . get_the_date('d/m/Y'); ?>
                        </div>

                        <div class="item__content__excerpt">
                            <?php echo get_excerpt(30); ?>
                        </div>
                    </div>


                <?php endwhile;
                wp_reset_query();
                endif;
                ?>
            </div>
        </div>
        <div class="col-right">
            <h3> <?php _e('[:en]Most View Posts [:vi]Bài viết được xem nhiều') ?></h3>
            <div class="list-item">
                <?php if ($most_view_item->have_posts()): ?>
                    <?php
                    while ($most_view_item->have_posts()): $most_view_item->the_post();
                        ?>
                        <div class="item">
                            <a href="<?php the_permalink(); ?>" class="item__pic">
                                <?php
                                if (has_post_thumbnail()):
                                    the_post_thumbnail('large');
                                else:?>
                                    <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                         alt="">
                                <?php endif; ?>
                            </a>
                            <div class="item__content">
                                <div class="item__content__date">
                                    <i class="fa fa-clock-o"></i> <?php echo get_the_time('G:i') . ' ' . get_the_date('d/m/Y'); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="item__content__title"
                                   title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                        </div>


                    <?php endwhile;
                    wp_reset_query();
                endif;
                ?>
            </div>


        </div>
    </section>
    <nav class="section-nav wow fadeInUp"
         data-wow-duration="1s"
         data-wow-delay="0.5s"
         data-wow-offset="100">
        <ul>
            <li class="<?= $category_slug == 'blog' ? 'active' : ''; ?>">
                <a href="<?php echo home_url() . '/blog'; ?>">All</a>
            </li>

            <?php
            $categories_child = get_categories(
                array('parent' => $categories_id, 'hide_empty' => false)
            );
            
            foreach ($categories_child as $subcat) :
                $cat_chil_slug = $subcat->slug;
                $id_categories_multiple = $subcat->cat_ID;
                $categories_multiple_child = get_categories(
                    array('parent' => $id_categories_multiple, 'hide_empty' => false)
                );
            ?>
    
                <li class="<?= $cat_chil_slug == $category_slug ? 'active' : ''; ?>">
                    <a href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)) ?>"
                        class="<?= count($categories_multiple_child) != 0  ? 'title' : ''; ?>">
                        <?= $subcat->name ?>
                    </a>
                    <ul class="sub-categories">
                        <?php foreach ($categories_multiple_child as $submuliple):
                            $cat_multiple_slug = $submuliple->slug;
                         ?>
                            <li>
                                <a href="<?= esc_url(get_term_link($submuliple, $submuliple->taxonomy)) ?>" title="">
                                    <?= $submuliple->name ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>   
                </li>
            <?php
            endforeach;
            ?>
        </ul>

    </nav>
    <section class="section-main wow fadeInUp"
             data-wow-duration="1s"
             data-wow-delay="0.5s"
             data-wow-offset="100">

        <?php if ($list_item->have_posts()): ?>
            <div class="list-item">
                <?php
                while ($list_item->have_posts()): $list_item->the_post();
                    ?>
                    <div class="item">
                        <a href="<?php the_permalink(); ?>" class="item__pic">
                            <?php
                            if (has_post_thumbnail()):
                                the_post_thumbnail('large');
                            else:?>
                                <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                     alt="">
                            <?php endif; ?>
                        </a>
                        <div class="item__content">
                            <div class="item__content__date">
                                <i class="fa fa-clock-o"></i> <?php echo get_the_time('G:i') . ' ' . get_the_date('d/m/Y'); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="item__content__title"
                               title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                    </div>


                <?php endwhile; ?>
            </div>
            <?php wp_pagenavi(array('query' => $list_item));
            wp_reset_query();
        endif;
        ?>


    </section>
</div>


<?php
get_footer(); ?>
