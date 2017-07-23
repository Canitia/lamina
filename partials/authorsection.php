

<section class="author-profile">
<hr class="cat-links-hr" />
    <strong class="author-name"><?php the_author_posts_link();?></strong>
<?php 
    if ( get_the_author_meta( 'description' ) ) {
    echo get_avatar( get_the_author_meta('email'), '100' ); 
?>

<?php if ( get_theme_mod( 'show_authorsocial', 'show' ) == 'show' ) : ?>
    <div class="author-social float-right">
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
    </div>
<?php endif; ?>

        <p class="author-bio">
        <br />
        <?php echo nl2br(get_the_author_meta('description'));  ?>
        </p>
 <?php  } /* end author meta */
    else {
      echo get_avatar( get_the_author_meta('email'), '50' );       
    }

?>
</section>
<?php if ( !is_page() ) { ?>
<hr class="cat-links-hr" />
<?php } /* end is page */


?>
