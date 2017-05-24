<section class="author-profile">
<hr />
<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
    <p class="author-bio">
    <strong class="author-name"><?php the_author_posts_link();?></strong>
<br />
<?php echo nl2br(get_the_author_meta('description'));  ?>
</p>
</section>
<hr />