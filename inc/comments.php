<?php

function thaiExpatCommentsForm() {
    $req      	= get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req 	= ( $req ? " required='required'" : '' );
    $html5    	= current_theme_supports( 'html5', 'comment-form' );
    $commenter	= wp_get_current_commenter();

    comment_form([
        'title_reply_before'   => '<div class="comments__form-title">',
        'title_reply_after'    => '</div>',
        'class_form' => 'comments__form',
        'class_container' => 'comments__form-wrap',
        'fields'               => [
            'author' => '<p class="comment-form-author">
			<input class="comments__form-input" placeholder="Ваше имя... *" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
		</p>',
            'email'  => '<p class="comment-form-email">
			<input class="comments__form-input" placeholder="Электронная почта... *" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
		</p>',
            'cookies' => '',
        ],
        'comment_field'        => '<p class="comment-form-comment">
		<textarea class="comments__form-input" placeholder="Оставить свой комментарий... *" id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
	    </p>',
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s comments__form-btn btn btn_big" value="%4$s" />',
    ]);
}

function enqueue_comment_reply() {
    if( is_singular() )
        wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );