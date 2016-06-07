      <?php get_header(); ?>
      <div class="tag_heading center-align">
      <h3><?php
            $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
            echo $curauth->nickname; ?></h3>
      <hr />
      </div>
      <div class="row">
      <div class="col s12 m12 l8 main-content">
                     <?php if ( have_posts() ) : ?>
                         <?php while ( have_posts() ) : the_post(); ?>
                           <div class="card">
                                 <div <?php post_class(); ?>>
                                     <article>
                                       <p class="postdate right"><i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
                                       <div class="card-image">
                                         <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                         <?php if ( has_post_thumbnail() ) {
                                                       the_post_thumbnail( 'medium', array( 'class' => 'responsive-img' ) );
                                               } else { ?>
                                                 <img src="<?php bloginfo('template_directory'); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" />
                                                 <?php }; ?>
                                         </a>
                                         <span class="card-title">
                                           <p class="posttitle"><?php the_title(); ?></p>
                                           </p></span>
                                       </div>
                                       <div class="card-content">
                                         <p><?php the_excerpt(); ?></p>
                                       </div>
                                     </article><!-- close article -->
                             </div><!-- close post class div -->
                           </div>
                                 <!-- column end! -->

                             <!-- error handling -->
                             <?php endwhile; else: ?>
                                   <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
                             <?php endif; ?>

                             <?php wp_link_pages('before=<ul class="pagination accentcolor2 center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
                           </div><!-- einde md8 -->

     <div class="col l4 hide-on-med-and-down">
         <?php get_sidebar( 'primary' ); ?>
     </div>

   </div><!-- end row -->
 </div><!-- container fluid END! -->

 <!-- start of footer -->
 <?php get_footer(); ?>
