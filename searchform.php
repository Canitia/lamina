<li class="collection-header center"><h1 class="widget-title text-left-title-featured-sidebar accentcolor2 center-align">Search</h1></li>
<div class="search-box">
  <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
      <label>
          <input type="search" class="search-field"
              placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder' ) ?>"
              value="<?php echo get_search_query() ?>" name="s"
              title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
      </label>
      <input type="submit" class="search-submit btn"
          value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
  </form>
</div>
