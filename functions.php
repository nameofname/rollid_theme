<?php

// DEFINE global variable THEME_ROOT to make requiring files easier:
define(THEME_ROOT, realpath(__DIR__));

function piss_off() {
    $out = "this is the output of this functin";
    echo $out;
}

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

        $in_sidebar = ($curr_val === 'true') ? "checked='true' " : '';
        $not_in_sidebar = ($curr_val === 'true') ? '' : "checked='true' " ;

$str = <<<EOT
        <label for="sidebar">Yes
            <input name='sidebar' value='true' type='radio' $in_sidebar/>
        </label>
        <label for="sidebar">No
            <input name='sidebar' value='false' type='radio' $not_in_sidebar/>
        </label>
EOT;
        echo $str;
        return $str;
    }

    // Simple save - boolean based on radio button.
    function save_sidebar_metabox ($post_id) {

        // Get the post data from the field named "sidebar" I defined:
        $val = $_POST['sidebar'];

        update_post_meta($post_id, 'put_in_sidebar', $val);
    }
}

// If we are on a post admin screen, then invoke the add_sidebar_custom_box() method:
//$curr_screen = get_current_screen();
if ($pagenow === 'post.php') {
    add_sidebar_metabox();
}
