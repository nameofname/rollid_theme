<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h1 class="content-heading"><strong><?php the_title(); ?></strong></h1>

                <div class="content">
                    <?php the_content('Read more &raquo;'); ?>


                    <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

                </div>

            <?php endwhile; ?>

                <div class="navigation">
                    <span class="prevlink"><i class="fa fa-arrow-left"></i> <?php next_posts_link('Previous entries') ?></span>
                    <i class="fa fa-rocket"></i>
                    <span class="nextlink"><?php previous_posts_link('Next entries') ?> <i class="fa fa-arrow-right"></i></span>
                </div>


                <?php else: ?>


                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

            <?php comments_template(); ?>

        </div>

    </div>

    <div class="row">
        <?php get_footer(); ?>
    </div>

</div>
