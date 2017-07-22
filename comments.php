<?php
if ( post_password_required() )
return;
?>
     <h3 class="h3-join-the-conversation" style="<?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Join the conversation', 'canitia'); ?></h3>
<div class="comments-wrapper">

<?php if ( have_comments() ) : ?>
	<ul class="commentlist">
		<?php wp_list_comments();
	?></ul>
	<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) :
// If comments are open, but there are no comments.
	else : // comments are closed
	endif;

endif;

comment_form();
?>

</div>
