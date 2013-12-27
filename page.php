<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php

            $page_data = get_page($page_id);
            echo $page_data->post_content;

            ?>

            <?php comments_template(); ?>

        </div>

    </div>

    <div class="row">
        <?php get_footer(); ?>
    </div>

</div>
