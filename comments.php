<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
    <p>This page is password protected. Enter your password to continue!</p>
    <?php return; endif; ?>

<?php if ( my_comments_open($post)) : ?>
<div id="comments" class="well">

<?php if ( $comments ) : ?>
    <h2>Comments</h2>

    <?php foreach ($comments as $comment) : ?>

        <div class="comment">
            <div><?php if (function_exists('get_avatar')) { echo get_avatar($comment,$size='48'); } ?></div>
            <br />

            <blockquote>
                <?php comment_text() ?>
                <small>
                    <?php if ('' != get_comment_author_url()) { ?><a href="<?php comment_author_url(); ?>"><?php comment_author() ?></a><?php } else { comment_author(); } ?>
                    <?php edit_comment_link('<i class="fa fa-pencil"></i> edit',''); ?> <span class="small"> <?php comment_date() ?></span>
                </small>
            </blockquote>

            <?php if ($comment->comment_approved == '0') : ?>
                <p>Thank you for your comment! It has been added to the moderation queue and will be published here if approved by the webmaster.</p>
            <?php endif; ?>
        </div>



    <?php endforeach; ?>
<?php endif; ?>

<?php if ($post->comment_status == "open") : ?>

        <p>Leave a comment</p>

        <form  id="commentform" class="form-horizontal" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

            <?php if ($user_ID) : ?>
                <p class="loggedin">You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. </p>

            <?php else : ?>
                <div class="form-group">
                    <label for="author" class="col-sm-2 control-label">*Name:</label>
                    <div class="col-sm-10">
                        <input name="author" class="form-control" type="text" value="<?php echo $comment_author; ?>" tabindex="1" /><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">*Email:</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" type="text" value="<?php echo $comment_author_email; ?>" tabindex="2" /><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">URL:</label>
                    <div class="col-sm-10">
                        <input name="url" class="form-control" type="text" value="<?php echo $comment_author_email; ?>" tabindex="2" /><br/><br/>
                    </div>
                </div>

            <?php endif; ?>

            <div class="form-group">
                <label for="comment" class="col-sm-2 control-label">Message:</label>
                <div class="col-sm-10">
                    <textarea name="comment" class="form-control" type="text" value="<?php echo $comment_author_email; ?>" tabindex="2"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button name="submit" type="submit" class="btn btn-default">Submit</button>

                    <input name="comment_post_ID" type="hidden" value="<?php echo $id; ?>" />
                    <input name="redirect_to" type="hidden" value="<?= $_SERVER['REQUEST_URI'] ?>" />

                </div>
            </div>


            <?php do_action('comment_form', $post->ID); ?>
        </form>

<?php endif; ?>

</div>

<?php endif;  ?>
