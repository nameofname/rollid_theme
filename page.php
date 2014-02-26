<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <?php

                // Start the Loop.
                while ( have_posts() ) : the_post();

                    // Simple function to recall the pae content:
                    the_content();

                endwhile;

                // Show the comments template:
                comments_template();
            ?>

        </div>

    </div>

</div>

<?php get_footer(); ?>