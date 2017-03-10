<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to dahz_comment() which is
 * located in the includes/admin/theme-comments.php file.
 *
 * @package DahzFramework
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (!post_password_required()) { ?>

    <div id="comments" class="comments-area">

        <?php // You can start editing here -- including this comment!  ?>

        <?php if (have_comments()) : ?>

            <h3 class="comments-title">

                <?php printf(_nx('One comment', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'dahztheme'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?>

            </h3>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>

                <nav id="comment-nav-above" class="comment-navigation" role="navigation">

                    <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'dahztheme')); ?></div>

                    <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'dahztheme')); ?></div>

                </nav><!-- #comment-nav-above -->

            <?php endif; // check for comment navigation  ?>

            <ol class="comment-list">

                <?php
                    /* Loop through and list the comments. Tell wp_list_comments()
                     * to use dahz_comment() to format the comments.
                     * If you want to override this in a child theme, then you can
                     * define dahz_comment() and that will be used instead.
                     * See dahz_comment() in includes/admin/theme-comments.php for more.
                     */
                    wp_list_comments(array('callback' => 'dahz_comment', 'type' => 'comment', 'avatar_size' => 60));
                ?>

            </ol><!-- .comment-list -->

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>

                <nav id="comment-nav-below" class="comment-navigation" role="navigation">

                    <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'dahztheme')); ?></div>

                    <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'dahztheme')); ?></div>

                </nav><!-- #comment-nav-below -->

            <?php endif; // check for comment navigation  ?>

        <?php endif; // have_comments() ?>

        <!-- If comments are closed and there are comments, let's leave a little note, shall we? -->
        <?php if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>

            <p class="no-comments"><?php _e('Comments are closed.', 'dahztheme'); ?></p>

        <?php endif; ?>

        <?php
            $commenter      = wp_get_current_commenter();
            $req            = get_option('require_name_email');
            $aria_req       = ( $req ? " aria-required='true'" : '' );
            $required_text  = sprintf(' ' . __('Required fields are marked %s', 'dahztheme'), '<span class="required">*</span>');
            $df_btn_shape   = esc_attr( df_btn_shape() );

            $comment_form_args = array(
                'title_reply'           => __( 'Leave a Reply', 'dahztheme' ),
                'title_reply_to'        => __( 'Leave a Reply to %s', 'dahztheme' ),
                'cancel_reply_link'     => __( 'Cancel Reply', 'dahztheme' ),
                'label_submit'          => __( 'Post Comment', 'dahztheme' ),
                'class_submit'          => 'submit ' . $df_btn_shape,
                'fields'                => apply_filters('comment_form_default_fields', array(
                            'author'    => '<div class="form-fields"><span class="comment-form-author">' . '<label class="assistive-text" for="author">' . __('Name &#42;', 'dahztheme') . '</label><input id="author" name="author" type="text" placeholder="' . __('Name&#42;', 'dahztheme') . '" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></span>',
                            'email'     => '<span class="comment-form-email"><label class="assistive-text" for="email">' . __('Email &#42;', 'dahztheme') . '</label><input id="email" name="email" type="text" placeholder="' . __('Email&#42;', 'dahztheme') . '" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></span>',
                            'url'       => '<span class="comment-form-url"><label class="assistive-text" for="url">' . __('Website', 'dahztheme') . '</label><input id="url" name="url" type="text" placeholder="' . __('Website', 'dahztheme') . '" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></span></div>'
                        )
                ),
                'comment_field'         => '<p class="comment-form-comment"><label class="assistive-text" for="comment">' . __('Comment', 'dahztheme') . '</label><textarea class="u-full-width" id="comment" placeholder="' . __('Comment', 'dahztheme') . '" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
                'comment_notes_after'   => '<span></span>',
                'must_log_in'           => '<p class="must-log-in text-small">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.', 'dahztheme'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
                'logged_in_as'          => '<p class="logged-in-as text-small">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">%4$s</a>', 'dahztheme'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink())), __('Log out?' ,'dahztheme') ) . '</p>',
                'comment_notes_before'  => '<p class="comment-notes text-small">' . __('Your email address will not be published.', 'dahztheme') . ( $req ? $required_text : '' ) . '</p>',
            );
        ?>

        <?php comment_form($comment_form_args); ?>

        <div class="clear"></div>

    </div><!-- #comments -->

<?php } ?>
