<?php

// DEFINE global variable THEME_ROOT to make requiring files easier:
define(THEME_ROOT, realpath(__DIR__));

/**
 * Register our sidebars and widgetized areas.
 *
 */
function ronald_widgets_init() {

    register_sidebar( array(
        'name' => 'Sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ronald_widgets_init' );


/**
 * Add custom meta box to all post pages:
 */
function add_sidebar_metabox () {

    // Add the actions to create the metabox, and save the returned data:
    add_action('add_meta_boxes', 'do_sidebar_metabox');
    add_action('save_post', 'save_sidebar_metabox' );

    // Invoke add_meta_box() wordpress API method:
    function do_sidebar_metabox () {
        add_meta_box('add-to-sidebar', 'Add post to sidebar?', 'sidebar_metabox_html', 'post', 'side');
    }

    // Prints HTML for sidebar metabox.
    function sidebar_metabox_html ($post) {
        $id = $post->ID;
        $curr_val = get_post_meta($id, 'put_in_sidebar', true);
        $curr_title = get_option('sidebar_title');

        $in_sidebar = ($curr_val === 'true') ? "checked='true' " : '';
        $not_in_sidebar = ($curr_val === 'true') ? '' : "checked='true' " ;

$str = <<<EOT
        <div>
        <label for="sidebar">Yes
            <input name='sidebar' value='true' type='radio' $in_sidebar/>
        </label>
        <label for="sidebar">No
            <input name='sidebar' value='false' type='radio' $not_in_sidebar/>
        </label>
        </div>
        <label>Enter the name of your sidebar's title:</label>
        <input name="title" type="text" value="$curr_title" />
EOT;
        echo $str;
        return $str;
    }

    // Simple save - boolean based on radio button.
    function save_sidebar_metabox ($post_id) {

        // Get the post data from the field named "sidebar" I defined:
        $val = $_POST['sidebar'];
        $new_title = $_POST['title'];

        // Update the metadata for this post re: whether or not it is in the sidebar:
        update_post_meta($post_id, 'put_in_sidebar', $val);

        // Update the option for the sidebar title:
        add_option('sidebar_title');
        update_option('sidebar_title', $new_title);
    }
}

// If we are on a post admin screen, then invoke the add_sidebar_custom_box() method:
//$curr_screen = get_current_screen();
if ($pagenow === 'post.php') {
    add_sidebar_metabox();
}

/**
 * Gets an array of all posts that are tagged with the custom meta attribute "put_in_sidebar"
 * @return mixed
 */
function get_sidebar_posts () {
    global $wpdb;

    // INNER JOIN wp_postmeta to wp_posts
    $query = "select
            p.*
        from
            wp_postmeta m
        inner join	wp_posts p
        on
            p.ID = m.post_id
        where
            m.meta_key = 'put_in_sidebar';
        ";

    $rows = $wpdb->get_results($query);
    return $rows;
}

/**
 * Determine whether posts are open for a given page - in our site we allow comments for all blog posts, but not for
 * pages:
 * @param $post
 * @return bool
 */
function my_comments_open($post) {
    return $post->post_type === 'page' ? false : true;
}


/**
 * Adds admin menu screen to enter keywords and description:
 */
function add_keywords_admin() {
    add_action( 'admin_menu', function() {
        add_menu_page( 'custom menu title', 'Meta keywords', 'manage_options', 'keywords_page', function () {
            require_once(__DIR__ . '/inc/keywords_menu.php');
        });
    });
}

/**
 * If keywords and description $_POST data was passed, this function will save it.
 */
function save_keywords() {
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];

    if ($description) {
        add_option('seo_description', $description, '', 'yes');
        update_option('seo_description', $description);
    }

    if ($keywords) {
        add_option('seo_keywords', $keywords, '', 'yes');
        update_option('seo_keywords', $keywords);
    }
}

// If the user is admin, then add the keywords admin page.
if (is_admin()) {
    add_keywords_admin();
}

// If the user is on the keywords admin page, then get POSTed data and attempt to save it.
if ($_GET['page'] == 'keywords_page') {
    save_keywords();
}

