<?php		
    $args = array(		
      'posts_per_page' => 3,		
      'post__in'  => get_option( 'sticky_posts' )		
     );		
     $query = new WP_Query( $args );		
 		
     if ( $query->have_posts() ) : ?>		
        <div class="slider">		
        <ul class="slides">		
        <?php		
        // The Loop		
        if ( $query->have_posts() ) {		
        while ( $query->have_posts() ) {		
            $query->the_post();		
            echo '<li>';		?>		
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">		
            <?php if ( has_post_thumbnail() ) {		
                        the_post_thumbnail( 'full', array( 'class' => 'responsive-img' ) );		
                } else { ?>		
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" />		
                    <?php }; ?>		
            <?php		
            echo '<div class="caption center-align"><h1 class="h1-slider">';		
            the_title();		
            echo '</h1></div></a></li>';		

        }		
        }?>
        </ul>
      <?php endif;?>

    </div>