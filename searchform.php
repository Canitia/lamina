<h1 class="widget-title text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color' ); ?>;"><?php _e('Search', 'canitia');?></h1>
<div class="search-box">
  <form role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <label>
          <input type="search" class="search-field"
              placeholder="<?php echo esc_attr_x( 'What are you looking for?', 'placeholder', 'canitia' ) ?>"
              value="<?php echo get_search_query() ?>" name="s"
              title="<?php echo esc_attr_x( 'Search for:', 'label', 'canitia' ) ?>" maxlength="50" />
      </label>
      <input type="submit" class="search-submit btn float-right"
          value="<?php echo esc_attr_x( 'Go', 'submit button', 'canitia' ) ?>" />
  </form>
</div>