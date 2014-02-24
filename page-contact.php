<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div id="page-content" class="col-md-9 col-sm-9 col-xs-12">

            <h1 class="no-margin-top">Contact Danielle:
                (<span class="magenta "><i class="fa fa-female"></i> <i class="fa fa-plus"></i> <i class="fa fa-envelope"></i></span>)
            </h1>
            <?php

            echo do_shortcode( '[contact-form-7 id="1429" title="Contact form 1"]' );

            // Note: No content will be displayed on this page:
//            $page_data = get_page($page_id);
//            echo $page_data->post_content;

            ?>

        </div>

    </div>

</div>

<?php get_footer(); ?>