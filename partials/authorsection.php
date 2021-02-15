<section class="author-profile content-wrap">
<div class="row">

    <?php if ( get_the_author_meta( 'description' ) ) { ?>
    <div class="col-sm-2 col-md-2">
        <?php 
            echo get_avatar( get_the_author_meta('email'), '100', $default, $alt, array( 'class' => array( 'avatar-post' ) ) ); 
        ?>
    </div>
    <div class="col-sm-10 author-bio-text">
        <h3><?php the_author_posts_link();?></h3>
        <?php echo nl2br(get_the_author_meta('description'));  ?>
    </div>
    <?php  } /* end author meta */ else { ?>
        <p class="text-center"> <?php esc_html_e('Please fill in a author bio to show the author section or disable it from the Lamina Settings.', 'lamina' ) ;?> </p>
    <?php }
    ?>
</div>
</section>
