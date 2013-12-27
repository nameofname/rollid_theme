<?php get_header(); ?>

<div id="wrapper" class="container">

    <div class="row">

        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h2 class="contentheader"><?php the_title(); ?></h2>
                <div class="content">
                    <div class="permalink"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Permanent Link</a></div>
                    <?php the_content('Read more &raquo;'); ?>


                    <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
                    <div id="postinfotext">
                        Posted: <?php the_time('F jS, Y') ?><br/>
                        Categories: <?php the_category(', ') ?><br/>
                        Tags: <?php the_tags(''); ?><br/>
                        Comments: <a href="<?php comments_link(); ?>"><?php comments_number('No Comments','1 Comment','% Comments'); ?></a>.
                    </div>

                </div>

            <?php endwhile; ?>

                <div class="navigation">
                    <span class="prevlink"><?php next_posts_link('Previous entries') ?></span>
                    <span class="nextlink"><?php previous_posts_link('Next entries') ?></span>
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
