<div class="col s12 m4 l4 hide-on-small-only sidebar"><!-- start of a sidebar item -->
		<ul>
			<?php if ( ! dynamic_sidebar('primary') ) : ?>
				<li><?php _e('There are currently no widgets enabled.', 'cerulean-for-ghost'); ?></li>
			<?php endif; ?>
		</ul>
</div><!-- end of sidebar item -->
