<!--<br />-->
<!--<br />-->
<p class="lead"><i><?= get_option('sidebar_title'); ?></i></p>
<ul id='sidebar_posts'>
<?php

// Get all posts tagged with "put_in_sidebar" -- then print a link for each:
$sidebar_posts = get_sidebar_posts();
//$str = "<h3><i>A special title that Danielle made up.</i></h3><ul id='sidebar_posts'>";
$str = "";
foreach ($sidebar_posts as $post) {
    $title = $post->post_title;
    $id = $post->ID;
    $str .= "<li><a href='/?p=$id'>$title</a></li>";
}
//$str .= "<ul>";
echo $str;
?>

</ul>