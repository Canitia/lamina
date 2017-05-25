<ul class="pagination center-align" role="pagination">
    <?php if( get_previous_posts_link() ) :
        previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-ellipsis-h"></i></li>' );
    endif; ?>

    <li class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?></li>
    
    <?php if( get_next_posts_link() ) :
        next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-ellipsis-h"></i></li>' );
    endif; ?>
</ul>