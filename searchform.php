<h1 class="widget-title text-left-title-featured-sidebar"><?php esc_html_e('Search', 'lamina');?></h1>
<div class="search-box">
  <form role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <label>
          <input type="search" class="search-field"
              placeholder="<?php echo esc_attr_x( 'What are you looking for?', 'placeholder', 'lamina' ) ?>"
              value="<?php echo get_search_query() ?>" name="s"
              title="<?php echo esc_attr_x( 'Search for:', 'label', 'lamina' ) ?>" maxlength="50" />
      </label>
      <input type="submit" class="search-submit btn"
          value="<?php echo esc_attr_x( 'Go', 'submit button', 'lamina' ) ?>" />
  </form>
</div>