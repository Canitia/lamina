<?php
if ( post_password_required() )
return;
?>
<div class="comments-wrapper">
<?php if ( have_comments() ) : ?>
<h1 class="text-left-title-featured-sidebar text-center home-top-recent"><?php _e('Comments', 'lamina'); ?></h1>
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
	?>

	<?php comment_form(); ?>
	<?php // comments are closed
	endif;

endif;

?>

</div>
