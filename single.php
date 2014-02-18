<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h1 class="blog-title"><strong><?php the_title(); ?></strong></h1>

            <div class="content">
                <?php the_content('Read more &raquo;'); ?>


                <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

                <?php
                // Show the comments template:
                comments_template();
                ?>
            </div>

        <?php endwhile; ?>

        <?php else: ?>

            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>


        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- Placeholder container to make blog thinner... -->
        </div>

    </div>

</div>

<?php get_footer(); ?>