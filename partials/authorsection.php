

<section class="author-profile">
<hr />
    <strong class="author-name"><?php the_author_posts_link();?></strong>
<?php 
    if ( get_the_author_meta( 'description' ) ) {
    echo get_avatar( get_the_author_meta('email'), '100' ); 
    } /* end author meta */
    else {
      echo get_avatar( get_the_author_meta('email'), '50' );       
    }

?>
<p class="author-bio">
<br />
<?php echo nl2br(get_the_author_meta('description'));  ?>
</p>
</section>
<?php if ( !is_page() ) { ?>
<hr />
<?php } /* end is page */


?>
