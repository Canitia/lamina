<?php get_header();
?>
<div class="row">
  <div class="col s12 m12 l8 main-content">
  <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts by', 'cerulean-for-wordpress'); ?> <?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

echo $curauth->display_name;
?></h1>
   <ul class="collection">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();
?>

        <a href="<?php the_permalink();
?>">
        <li class="collection-item truncate">
            <p title="<?php the_title_attribute();
?>"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title();
?>
              <span class="badge">
              <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
?></time>
            </span> 
            </p>
        </li>
        </a>
    <!-- error handling -->
    <?php endwhile;
else: ?>
    <p>
      <?php echo wpautop( 'Sorry, there are no posts by this author' );
?>
    </p>
    <?php endif;
?>
    </ul>

    <?php wp_link_pages('before=<ul class="pagination center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>');
?>

    <!-- navigation?-->

    <ul class="pagination center-align" role="pagination">
      <?php if( get_previous_posts_link() ) :

previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-ellipsis-h"></i></li>' );


endif;
?>

      <li class="active">
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
echo $paged;
?>
      </li>
      <?php if( get_next_posts_link() ) :

next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-ellipsis-h"></i></li>' );


endif;
?>
    </ul>

  </div>
  <!-- einde md8 -->

    <?php get_sidebar( 'primary' );
?>

</div>
<!-- end row -->
</div>
<!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer();
?>
