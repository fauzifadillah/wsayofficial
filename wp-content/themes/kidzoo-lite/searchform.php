<form role="search" id="searchform" class="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <div class="input-group">

    <input type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'kidzoo-lite' ); ?>" value="<?php echo the_search_query(); ?>" name="s" id="search" title="<?php esc_attr_e('Search','kidzoo-lite'); ?>" />

    <span class="input-group-btn">
        <button type="submit" name="submit" id="searchsubmit" class="submit btn btn-primary" value="<?php esc_attr_e( 'Search', 'kidzoo-lite' ); ?>"><i class="fa fa-search"></i></button>
    </span>
  </div>

</form>
