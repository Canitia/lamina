<?php get_header(); ?>

   <div class="container-fluid">
     <div class="row">
          <div class="tag_heading center-align">
          <h3><?php single_cat_title(); ?></h3>
          <hr />
          </div>
       <?php if ( have_posts() ) : ?>
             <div class="main-content col s12 m12 l8">
           <?php while ( have_posts() ) : the_post(); ?>

                         <div class="card hoverable">
                           <article>
                                 <div>
                                   <?php if ( has_post_thumbnail() ) : ?>
                                       <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                           <?php the_post_thumbnail(); ?>
                                       </a>
                                   <?php endif; ?>
                                     </a>
                               </div>
                               <div>
                                         <h1 class="text-left-title center-align"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
                                         <p class="postdate center-align"><i class="fa fa-clock-o"></i><time> <?php echo get_the_date(); ?></time></p>
                                                   <?php the_excerpt(); ?>
                               </div>
                           </article>
                           </div>

               <!-- error handling -->
               <?php endwhile; else: ?>
                     <p><?php _e('Sorry, this page does not exist.'); ?></p>
               <?php endif; ?>

               <!-- navigation?-->

               <ul class="pagination accentcolor2 center-align" role="pagination">
                 <?php if( get_previous_posts_link() ) :

                 previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-arrow-left fa-2x"></i></li>' );

                 endif; ?>

                 <li class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?></li>
                 <?php if( get_next_posts_link() ) :

                 next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-arrow-right fa-2x"></i></li>' );

                 endif; ?>
               </ul>

               <!-- navigation?-->
     </div>
       <!-- second column (widget bar) -->
       <div class="col s12 m12 l4 hide-on-med-and-down">
           <?php get_sidebar( 'primary' ); ?>
       </div>

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
