<h1 class="widget-title text-left-title-featured-sidebar"><?php _e('Search', 'cerulean-for-wordpress');?></h1>
<div class="search-box">
  <form role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <label>
          <input type="search" class="search-field"
              placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'cerulean-for-wordpress' ) ?>"
              value="<?php echo get_search_query() ?>" name="s"
              title="<?php echo esc_attr_x( 'Search for:', 'label', 'cerulean-for-wordpress' ) ?>" />
      </label>
      <input type="submit" class="search-submit btn grey right"
          value="<?php echo esc_attr_x( 'Go', 'submit button', 'cerulean-for-wordpress' ) ?>" />
  </form>
</div>