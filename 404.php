<?php get_header(); ?>

   <div class="container-fluid">
     <div class="row">
                    <?php if ( have_posts() ) : ?>
                          <div class="main-content col s12 m12 l8">
                            <div class="card card-error big">
                                  <article>
                                    <h1 class="text-left-title accentcolor-error center-align">Whoops...</h1>
                                        <div class="col s12">
                                          <p>This post has been removed or went to the dark side. To continue please select a option from the navigation menu or go back a page.<p>
                                      </div>
                                  </article>
                                  </div>
                            <!-- navigation?-->

                    </div><!-- einde md8 -->  <!-- column end! -->

                    <!-- second column (widget bar) -->
                    <div class="col s12 m12 l4 hide-on-med-and-down">
                        <?php get_sidebar( 'primary' ); ?>
                    </div>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
