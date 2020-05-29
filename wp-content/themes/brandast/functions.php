<?php
//Remove Default jQuery
add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

//Add Style and Script
function add_theme_scripts()
{
    wp_enqueue_style('allstyle', get_template_directory_uri() . '/dist/css/all-import-style.css', array(), '1.0', 'all');
    wp_enqueue_style('mainstyle', get_template_directory_uri() . '/dist/css/mainstyle.css', array(), '1.0', 'all');
    wp_enqueue_script('allscript', get_template_directory_uri() . '/dist/js/all-import-script.min.js', array(), '1.1', true);
    wp_enqueue_script('mainscript', get_template_directory_uri() . '/dist/js/mainscript.js', array(), '1.1', true);
    wp_enqueue_script('script', get_template_directory_uri() . '/dist/plugins/Masonry/masonry.js', array(), '1.1', true);
}


add_action('wp_enqueue_scripts', 'add_theme_scripts');

//Include Project Custom post type
require get_template_directory() . '/inc/inc-project.php';
require get_template_directory() . '/inc/inc-service.php';
require get_template_directory() . '/inc/inc-solution.php';
require get_template_directory() . '/inc/inc-recruitment.php';

// Menu
function sontq_setup()
{
    //menu
    /********
     * Call: wp_nav_menu(array('theme_location'  => 'header','container'=> ''));
     * *********/
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'mainmenu' => __('Main menu', 'sontq'),
        'responsivemenu' => __('Responsive menu', 'sontq'),
        'langmenu' => __('Language menu', 'sontq'),
    ));
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    //Remove version
    remove_action('wp_head', 'wp_generator');
    //Remove Default WordPress Image Sizes
}

add_action('after_setup_theme', 'sontq_setup');

//Theme Options
if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'option',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

}
// Service Static Option
if (function_exists('acf_add_options_page')) {

    $option_service = acf_add_options_page(array(
        'page_title' => 'Service Static Option ',
        'menu_title' => 'Service Static Option ',
        'menu_slug' => 'service_option',
        'capability' => 'edit_posts',
        'position'	=> 7,
        'icon_url' 	=> 'dashicons-awards',
        'redirect' => false
    ));

}
// Contact Static Option
if (function_exists('acf_add_options_page')) {

    $option_contact_div = acf_add_options_page(array(
        'page_title' => 'Contact Div Option ',
        'menu_title' => 'Contact Div Option ',
        'menu_slug' => 'contact_div_option',
        'capability' => 'edit_posts',
        'position'  => 8,
        'icon_url'  => 'dashicons-portfolio',
        'redirect' => false
    ));

}


/*-----Count View------*/
function getPostViews($postID)
{ // hàm này dùng để lấy số người đã xem qua bài viết
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') { // Nếu như lượt xem không có
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return "0"; // giá trị trả về bằng 0
    }

    return $count; // Trả về giá trị lượt xem
}


function setPostViews($postID)
{// hàm này dùng để set và update số lượt người xem bài viết.
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++; // cộng đồn view
        update_post_meta($postID, $count_key, $count); // update count
    }
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
function posts_column_views($defaults)
{
    $defaults['post_views'] = __('Views');

    return $defaults;
}

function posts_custom_column_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo getPostViews(get_the_ID());
    }
}

/*-----Template Category Child-----*/
function wp_category_template()
{
    $category = get_queried_object();
    $parent_id = $category->category_parent;
    $templates = array();
    if ($parent_id == 0) {
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        $templates[] = 'category-blog.php';
    } else {
        $parent = get_category($parent_id);
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        $templates[] = "category-{$parent->slug}.php";
        $templates[] = "category-{$parent->term_id}.php";
        $templates[] = 'category-blog.php';
    }

    return locate_template($templates);
}

add_filter('category_template', 'wp_category_template');


/*------Excerpt-----*/
function get_excerpt($limit = 130)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

// Remove Parent Category from Child Category URL
add_filter('term_link', 'sontq_no_category_parents', 1000, 3);
function sontq_no_category_parents($url, $term, $taxonomy)
{
    if ($taxonomy == 'category') {
        $term_nicename = $term->slug;
        $url = trailingslashit(get_option('home')) . user_trailingslashit($term_nicename, 'category');
    }

    return $url;
}

// Rewrite url mới
function sontq_no_category_parents_rewrite_rules($flash = false)
{
    $terms = get_terms(array(
        'taxonomy' => 'category',
        'post_type' => 'post',
        'hide_empty' => false,
    ));
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $term_slug = $term->slug;
            add_rewrite_rule($term_slug . '/?$', 'index.php?category_name=' . $term_slug, 'top');
            add_rewrite_rule($term_slug . '/page/([0-9]{1,})/?$', 'index.php?category_name=' . $term_slug . '&paged=$matches[1]', 'top');
            add_rewrite_rule($term_slug . '/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?category_name=' . $term_slug . '&feed=$matches[1]', 'top');
        }
    }
    if ($flash == true) {
        flush_rewrite_rules(false);
    }
}

add_action('init', 'sontq_no_category_parents_rewrite_rules');

/*Sửa lỗi khi tạo mới category bị 404*/
function sontq_new_category_edit_success()
{
    sontq_no_category_parents_rewrite_rules(true);
}

add_action('created_category', 'sontq_new_category_edit_success');
add_action('edited_category', 'sontq_new_category_edit_success');
add_action('delete_category', 'sontq_new_category_edit_success');


// Customize Tiny mce editor font sizes for WordPress
if (!function_exists('am_tiny_mce_font_size')) {
    function am_tiny_mce_font_size($initArray)
    {
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 22px 24px 26px 28px 32px 34px 36px 38px 40px 42px 46px 48px 50px";// Add as needed

        return $initArray;
    }
}
add_filter('tiny_mce_before_init', 'am_tiny_mce_font_size');


if (function_exists('qtranxf_postsFilter') && has_filter('the_posts', 'qtranxf_postsFilter')) {
    remove_filter('the_posts', 'qtranxf_postsFilter', 5);

    function sontq_theme_custom_the_posts_filter($posts, $query)
    {
        qtranxf_postsFilter($posts, $query);

        return $posts;
    }

    add_filter('the_posts', 'sontq_theme_custom_the_posts_filter', 5, 2);
}


/**
 * Remove custom post type slug from URL.
 */
function pdvn_remove_slug($post_link, $post, $leavename)
{
    if ('project' != $post->post_type || 'publish' != $post->post_status) {
        return $post_link;
    }
    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);

    // $post_link = str_replace( '/san-pham/', '/', $post_link ); If used: $args['rewrite'] = array( 'slug' => 'san-pham' );
    return $post_link;
}

add_filter('post_type_link', 'pdvn_remove_slug', 10, 3);
/**
 * [pdvn_parse_request description]
 */
function pdvn_parse_request($query)
{
    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }
    if (!empty($query->query['name'])) {
        $query->set('post_type', array('post', 'project', 'page'));
    }
}

add_action('pre_get_posts', 'pdvn_parse_request');


//Covert checkbox  Sectort to radio

function checktoradio()
{
    echo '<script type="text/javascript">jQuery("#wpwrap #project_sectorchecklist input,#wpwrap  #project_sectorchecklist-pop input, #wpwrap #service_groupchecklist input").each(function(){this.type="radio"});</script> 
<style type="text/css">#wpwrap #project_sector-pop,#wpwrap #taxonomy-project_sector .hide-if-no-js,#wpwrap #service_group-tabs .hide-if-no-js{display: none !important;}</style>';
}

add_action('admin_footer', 'checktoradio');


//Ajax loadmore Project

add_action('wp_ajax_loadmore', 'get_post_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'get_post_loadmore');
function get_post_loadmore()
{
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : ''; // lấy taxonomy
    $term = isset($_POST['term']) ? $_POST['term'] : ''; // lấy term
    $page = isset($_POST['page']) ? $_POST['page'] : ''; // lấy page
    if ($taxonomy) {
        $argsterm = array(
            'showposts' => 8,
            'order' => 'DESC',
            'orderby' => 'DATE',
            'post_type' => 'project',
            'offset' => $offset,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $term
                )
            )
        );
    } else {
        $argsterm = array(
            'showposts' => 8,
            'order' => 'DESC',
            'orderby' => 'DATE',
            'post_type' => 'project',
            'offset' => $offset,
        );
    };
    $getposts = new WP_query($argsterm);
    global $wp_query;
    $wp_query->in_the_loop = true;
    $m = 1;
    ?>
    <div class="list-project  page-<?= $page ?>">
        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <div class="grid-item grid-item-<?= $m; ?>">
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
                        //                        var_dump($sectorchilds);
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


            <?php $m++; endwhile;
        wp_reset_postdata(); ?>
    </div>
    <?php
}

?>

