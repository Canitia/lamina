<?php get_header();
?>
<div class="row">
  <div class="col s12 m8 l8 main-content">
  <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts by', 'cerulean-for-wordpress'); ?> 
  <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    echo '<strong>' . $curauth->display_name . '</strong>';?></h1>

   <ul class="collection">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();?>
        <a href="<?php the_permalink();?>">
        <li class="collection-item truncate">
            <p title="<?php the_title_attribute();
?>"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title();?>
              <span class="badge">
              <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';?></time>
            </span> 
            </p>
        </li>
        </a>
    <!-- error handling -->
    <?php endwhile; else: ?>
    <p>
      <?php _e('Sorry, there are no posts by this author.', 'cerulean-for-wordpress'); ?>
    </p>
    <?php endif;?>
    </ul>

     <?php get_template_part( 'partials/pagination' ); ?>

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
