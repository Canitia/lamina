<div class="pagination center-align" role="navigation">
    <?php if( get_previous_posts_link() ) :
        previous_posts_link( '<div class="pagination-arrows newer-posts"><i class="fa fa-angle-left" aria-hidden="true"></i></div>' );
    endif; ?>

    <p class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?></p>
    
    <?php if( get_next_posts_link() ) :
        next_posts_link( '<div class="pagination-arrows older-posts"><i class="fa fa-angle-right" aria-hidden="true"></i></div>' );
    endif; ?>
</div>