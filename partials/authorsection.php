<section class="author-profile">
<?php if ( get_the_author_meta( 'description' ) ) { ?>
<p class="postedby"><?php _e('This article was written by ', 'canitia');?></p>
<?php 
    echo get_avatar( get_the_author_meta('email'), '100' ); 
?>
<strong class="author-name"><?php the_author_posts_link();?></strong>
    <p class="author-bio">
    <br />
    <?php echo nl2br(get_the_author_meta('description'));  ?>
    </p>
 <?php  } /* end author meta */ else {
     _e('Please fill in a author description to show the author section or disable it from the Canitia Settings. ', 'canitia');
 }

?>
</section>
