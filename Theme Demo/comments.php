                        <div class="comments">
                            <h3>评论</h3>
														<?php $args = array(
															'walker'            => null,
															'max_depth'         => '',
															'style'             => 'ul',
															'callback'          => null,
															'end-callback'      => null,
															'type'              => 'all',
															'reply_text'        => '回复',
															'page'              => '',
															'per_page'          => '',
															'avatar_size'       => 80,
															'reverse_top_level' => null,
															'reverse_children'  => '',
															'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
															'short_ping'        => false,   // @since 3.6
															'echo'              => true     // boolean, default is true
														); ?>

														<?php wp_list_comments($args,$comments);

														$comments_args = array(
										        // change the title of send button
										        'label_submit'=>'提交',
										        // change the title of the reply section
										        'title_reply'=>'回复/评论',
										        // remove "Text or HTML to be displayed after the set of comment fields"
										        'comment_notes_after' => '',
										        // redefine your own textarea (the comment body)
										        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
														);

														comment_form($comments_args);
														?>

                        </div> <!-- /.comments -->