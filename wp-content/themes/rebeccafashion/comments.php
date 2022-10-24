<?php
if ( post_password_required() ) {
	return;
}
$fields =  array(
    'author' => '<div class="row"><div class="col-sm-6"><input type="text" name="author" id="name" class="input-form" placeholder="Name*" /></div>',
    'email'  => '<div class="col-sm-6"><input type="text" name="email" id="email" class="input-form" placeholder="Email*"/></div>',
    'website'=>'<div class="col-sm-12"><input type="text" name="url" id="url" class="input-form" placeholder="Website"/></div></div>'

);
$custom_comment_form = array( 
    'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'         => '
    <textarea name="comment" id="message" class="textarea-form" placeholder="Comment" rows="1"></textarea>',
    'cancel_reply_link'     => esc_html__( 'Cancel' , 'rebeccafashion' ),
    'comment_notes_before'  => '<p class="comment-notes">Your email address will not be published. Required fields are marked *</p>',
    'comment_notes_after'   => '',
    'title_reply'           => esc_html__( 'Leave a Reply' , 'rebeccafashion' ),
    'label_submit'          => esc_html__( 'Submit' , 'rebeccafashion' ),
    'id_submit'             => 'comment_submit'
);

?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">    
        <?php if ( comments_open() ) : ?>
            <h3 class="comments-title"><?php comments_number( null, esc_html__('1 Comment', 'rebeccafashion'), '% ' . esc_html__('Comments', 'rebeccafashion') ); ?></h3>
       	<?php endif; ?>
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'rebeccafashion' ); ?></h1>
    		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
    		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
    	</nav><!-- #comment-nav-above -->
    	<?php endif; // Check for comment navigation. ?>    
    	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 90,
                'callback'	  => 'rebeccafashion_custom_comment'
			) );
		?>
    	</ol><!-- .comment-list -->    
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'rebeccafashion' ); ?></h1>
    		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
    		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
    	</nav><!-- #comment-nav-below -->
    	<?php endif; // Check for comment navigation. ?>    
    	<?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'rebeccafashion' ); ?></p>
    	<?php endif; ?>
</div>
<?php endif; ?>
<!-- Leave reply -->
<?php comment_form($custom_comment_form); ?>
<!-- Leave reply -->