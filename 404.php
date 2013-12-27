<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-8 col-sm-8 col-xs-12">
            <img width='100%' src="<?php bloginfo('template_directory'); ?>/not-found.jpg" />
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 sidebar-right">
            <?php get_sidebar(); ?>
        </div>

    </div>

    <div class="row">
        <?php get_footer(); ?>
    </div>

</div>


