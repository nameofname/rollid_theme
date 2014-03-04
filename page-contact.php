<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <h1 class="blog-title">Contact Danielle:
                (<span class="magenta "><i class="fa fa-female"></i> <i class="fa fa-plus"></i> <i class="fa fa-envelope"></i></span>)
            </h1>
            <?php
            echo do_shortcode( '[contact-form-7 id="1419" title="Contact form 1"]' );
            ?>

        </div>

    </div>

</div>

<?php get_footer(); ?>