<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php $id = get_the_ID(); ?>

                <h1 class="blog-title"><strong>
                    <a href="<?= get_permalink($id); ?>"><?php the_title(); ?></a>
                </strong></h1>

                <div class="content">

                    <?php the_content('MORE...'); ?>

<!--                    --><?php //the_excerpt(); ?>
<!--                    <a href="--><?//= get_permalink($id); ?><!-- ">MORE...</a>-->

                    <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

                </div>

            <?php endwhile; ?>

                <div class="navigation">
                    <span class="prevlink">
                        <?php next_posts_link('<i class="fa fa-arrow-left"></i>Previous entries') ?>
                    </span>
                    <i class="fa fa-rocket"></i>
                    <span class="nextlink">
                        <?php previous_posts_link('Next entries <i class="fa fa-arrow-right"></i>') ?>
                    </span>
                </div>


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