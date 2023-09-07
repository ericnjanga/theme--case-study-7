<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'your-theme-text-domain' ); ?></span>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'your-theme-text-domain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit btn btn-secondary">
        Search <i class="fa fa-search"></i>
    </button>
</form>
