<ul class="pagination center-align" role="navigation">
    <?php if( get_previous_posts_link() ) :
        previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-angle-left" aria-hidden="true"></i></li>' );
    endif; ?>

    <li class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?></li>
    
    <?php if( get_next_posts_link() ) :
        next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-angle-right" aria-hidden="true"></i></li>' );
    endif; ?>
</ul>