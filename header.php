<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>

    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
    <meta name="keywords" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/fa/css/font-awesome.css" />

    <!-- wp_head() inserts several script tags. I would love them to be at the end of the document but damn wordpress...-->
    <?php wp_head(); ?>

</head>

<body>


<!--    <div id="header" >-->
<!--        <h1><a href="--><?php //bloginfo('url'); ?><!--" title="--><?php //bloginfo('name'); ?><!--">--><?php //bloginfo('name'); ?><!--</a></h1>-->
<!--        <h2>--><?php //bloginfo('description'); ?><!--</h2>-->
<!--    </div>-->