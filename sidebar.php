<?php if ( is_active_sidebar( 'primary' ) ) : ?>
<div class="col-md-4 col-lg-4 hidden-sm-down sidebar d-flex flex-column"><!-- start of a sidebar item -->
	<?php dynamic_sidebar( 'primary' ); ?>
</div><!-- #primary-sidebar -->
<?php endif; ?>