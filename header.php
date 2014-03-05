<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <title>
        <?php
        echo bloginfo('name') . ' ';
        echo bloginfo('description');
        echo ' | ';
        echo get_the_title($ID);
        ?>
    </title>

    <?php
    $description = get_option('seo_description');
    $keywords = get_option('seo_keywords');
    ?>

    <meta name="description" content="<?php echo $description  ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />

    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo(PUBLIC_ROOT . '/style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo(PUBLIC_ROOT); ?>/styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo(PUBLIC_ROOT); ?>/styles/fa/css/font-awesome.css" />

    <!-- wp_head() inserts several script tags. I would love them to be at the end of the document but damn wordpress...-->
    <?php wp_head(); ?>

</head>

<body>
<nav class="navbar" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <?php
                // Page links:
                echo wp_list_pages('title_li=&depth=1');
                ?>
            </ul>
        </div>
    </div>
</nav>
