

 <div id="carousel" class="carousel slide hidden-xs-down" data-ride="carousel">
  <div class="carousel-inner" role="listbox">

        <?php		
            $args = array(		
            'posts_per_page' => 3,		
            'post__in'  => get_option( 'sticky_posts' )		
            );		
            $query = new WP_Query( $args );

        $cc = count($query);
        // The Loop		
        if ( $query->have_posts() ) :
        $i=0;		
        while ( $query->have_posts() ) {		
            $query->the_post();	?>	
            <div class="carousel-item <?php echo ($i==0)?'active':''; ?>">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php if ( has_post_thumbnail() ) {		
                        the_post_thumbnail( 'full', array( 'class' => 'd-block img-fluid' ) );		
                    } else { ?>		
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" />		
                    <?php }  ?>
                     <div class="carousel-caption d-none d-md-block">
                        <h3><?php the_title(); ?></h3>
                    </div>
                    </a></div>
                    <?php $i++; 
                }; 
                      
            ?>	
                  <?php endif;?>
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
</div>
</div>