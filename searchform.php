<li class="collection-header center"><h1 class="widget-title text-left-title-featured-sidebar center-align"><?php _e('Search', 'cerulean-for-wordpress');?></h1></li>
<div class="search-box">
  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <label>
          <input type="search" class="search-field"
              placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'cerulean-for-wordpress' ) ?>"
              value="<?php echo get_search_query() ?>" name="s"
              title="<?php echo esc_attr_x( 'Search for:', 'label', 'cerulean-for-wordpress' ) ?>" />
      </label>
      <input type="submit" class="search-submit btn grey"
          value="<?php echo esc_attr_x( 'Go', 'submit button', 'cerulean-for-wordpress' ) ?>" />
  </form>
</div>
